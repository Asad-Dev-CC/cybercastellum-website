document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('leadgen-form');
  if (!form) return;

  const steps = Array.from(form.querySelectorAll('.leadgen-step'));
  const errorBox = form.querySelector('.leadgen-error');
  const progressFill = document.querySelector('.leadgen-progress-fill');
  const stateField = form.querySelector('[data-state-field]');
  const countrySelect = form.querySelector('select[name="country"]');
  let currentStep = 1;

  const updateSteps = () => {
    steps.forEach((stepEl) => {
      stepEl.classList.toggle('hidden', parseInt(stepEl.dataset.step, 10) !== currentStep);
    });
    if (progressFill) {
      progressFill.style.width = `${((currentStep - 1) / 3) * 100}%`;
    }
    if (stateField && countrySelect) {
      const country = countrySelect.value;
      stateField.classList.toggle('hidden', !['United States', 'Canada'].includes(country));
    }
    if (errorBox) {
      errorBox.textContent = '';
    }
  };

  const showError = (message) => {
    if (errorBox) {
      errorBox.textContent = message;
    }
  };

  const validateStep = () => {
    const get = (name) => form.querySelector(`[name="${name}"]`);
    if (currentStep === 1) {
      const email = get('email').value.trim();
      if (!email) return 'Please enter your work email.';
      if (!/^\S+@\S+\.\S+$/.test(email)) return 'Please enter a valid email address.';
      const blockedDomains = ['gmail.com', 'yahoo.com', 'yahoo.co.uk', 'hotmail.com', 'outlook.com', 'live.com', 'icloud.com', 'mail.com', 'aol.com', 'protonmail.com', 'zoho.com'];
      const domain = email.split('@')[1]?.toLowerCase();
      if (!domain || blockedDomains.includes(domain)) return 'Please use a business email address.';
      return '';
    }
    if (currentStep === 2) {
      if (!get('firstName').value.trim()) return 'First name is required.';
      if (!get('lastName').value.trim()) return 'Last name is required.';
      if (!get('jobFunction').value) return 'Please select a job function.';
      if (!get('jobRole').value) return 'Please select a job role.';
      if (!get('jobTitle').value.trim()) return 'Job title is required.';
      return '';
    }
    if (currentStep === 3) {
      if (!get('company').value.trim()) return 'Company / Organization is required.';
      if (!get('country').value) return 'Please select a country.';
      if (['United States', 'Canada'].includes(get('country').value) && !get('state').value.trim()) {
        return 'State / Province / Region is required.';
      }
      return '';
    }
    return '';
  };

  const goNext = () => {
    const error = validateStep();
    if (error) {
      showError(error);
      return;
    }
    if (currentStep < 3) {
      currentStep += 1;
      updateSteps();
      return;
    }
    submitForm();
  };

  const goBack = () => {
    if (currentStep > 1) {
      currentStep -= 1;
      updateSteps();
    }
  };

  const submitForm = () => {
    const data = new FormData(form);
    data.append('action', 'leadgen_form_submit');
    const nonceField = form.querySelector('input[name="leadgen_nonce"]');
    if (nonceField && nonceField.value) {
      data.append('leadgen_nonce', nonceField.value);
    } else if (leadgen_vars?.nonce) {
      data.append('leadgen_nonce', leadgen_vars.nonce);
    }

    showError('');
    const submitButton = form.querySelector('.leadgen-submit');
    if (submitButton) {
      submitButton.textContent = 'Sending...';
      submitButton.disabled = true;
    }

    fetch(leadgen_vars.ajax_url, {
      method: 'POST',
      body: data,
    })
      .then((response) => response.json())
      .then((json) => {
        if (submitButton) {
          submitButton.disabled = false;
          submitButton.textContent = 'Submit & Download';
        }
        if (!json.success) {
          showError(json.data?.message || 'Submission failed. Please try again.');
          return;
        }
        currentStep = 4;
        updateSteps();
      })
      .catch(() => {
        if (submitButton) {
          submitButton.disabled = false;
          submitButton.textContent = 'Submit & Download';
        }
        showError('Submission failed. Please try again later.');
      });
  };

  form.addEventListener('click', function (event) {
    const clickedButton = event.target.closest('button');
    if (!clickedButton) return;

    if (clickedButton.classList.contains('leadgen-next')) {
      event.preventDefault();
      goNext();
    }
    if (clickedButton.classList.contains('leadgen-back')) {
      event.preventDefault();
      goBack();
    }
    if (clickedButton.classList.contains('leadgen-submit')) {
      event.preventDefault();
      goNext();
    }
  });

  form.addEventListener('submit', function (event) {
    event.preventDefault();
    if (currentStep === 1) {
      goNext();
    }
  });

  if (countrySelect) {
    countrySelect.addEventListener('change', updateSteps);
  }

  updateSteps();
});