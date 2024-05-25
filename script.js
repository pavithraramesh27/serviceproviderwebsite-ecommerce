let subMenu =document.getElementById('submenu');

function toggleMenu()
{
    subMenu.classList.toggle("openmenu");
}

function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("searchTerm");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myMenu");
    li = ul.getElementsByTagName("li");
  
    for (i = 0; i < li.length; i++) {
      a = li[i].getElementsByTagName("a")[0];
      if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
      } else {
        li[i].style.display = "none";
      }
    }
  
    // Show or hide the list based on the input value
    if (filter.trim() === "") {
      ul.classList.add("hidden");
    } else {
      ul.classList.remove("hidden");
    }
  }
  