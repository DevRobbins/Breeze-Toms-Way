document.addEventListener('DOMContentLoaded', function () {    
    document.querySelectorAll('.alert').forEach((alert) => {
        alert.querySelector('.close').addEventListener('click', () => {
            alert.classList.add('d-none');
        })
    })
  }, false);