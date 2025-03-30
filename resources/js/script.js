document.getElementById("category_select").addEventListener("click", function() {
    this.querySelector("option").setAttribute("disabled", "true");
  });


  


  /*  navbar */

  const icon = document.querySelector('.icon');
  const menu = document.querySelector('.menu');
  const span = document.querySelector('.span')

  function toggleNavbar() {
      menu.classList.toggle('active');
      icon.classList.toggle('active');
  }

  document.querySelector('.toggle-btn').addEventListener('click', function () {
      toggleNavbar();
  });




