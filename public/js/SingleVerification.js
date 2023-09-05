const form = document.getElementById('form');
        const input = document.getElementById('SingleInputForm');
        const small = document.getElementById('error-message');
        form.addEventListener('submit', e => {
          e.preventDefault();
          validateInputs();
        });

        const validateInputs = () => {
            const inputValue = input.value?.trim() || '';
            if(inputValue === '' || inputValue === null) {
                small.innerText = "Ce champ est obligatoire";
            } else if(inputValue.length < 3) {
                small.innerText = "Ce champ doit dépasser 2 caractères";
                small.style.display = "block";
            }else {
              small.innerText = "";
              small.style.display = "none";
              form.submit();
            }
        };

        const UpdateForm = document.getElementById('update-form');
        const UpdateInput = document.getElementById('UpdateInput');
        const UpdateSmall = document.getElementById('update-error');
        UpdateForm.addEventListener('submit', e => {
            e.preventDefault();
            validateUpdate();
          });
        
        const validateUpdate = () => {
            const UpdateValue = UpdateInput.value?.trim() || '';
            if(UpdateValue === '' || UpdateValue === null) {
              UpdateSmall.innerText = "Ce champ est obligatoire";
            } else if(UpdateValue.length < 3) {
              UpdateSmall.innerText = "Ce champ doit dépasser 2 caractères";
              UpdateSmall.style.display = "block";
            }else {
              UpdateSmall.innerText = "";
              UpdateSmall.style.display = "none";
              UpdateForm.submit();
            }
        };

        // to hide the error message from update form to another
        $('#exampleModal').on('hidden.bs.modal', function () {
          UpdateSmall.style.display = "none";
        })
