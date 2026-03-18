
if(document.URL.indexOf("panier") >= 0
|| document.URL.indexOf("commandes") >= 0
|| document.URL.indexOf("profilsidebar") >= 0
|| document.URL.indexOf("changemdp") >= 0
|| document.URL.indexOf("listuser") >= 0) {
  document.querySelector('.black-opacity').style.display="none";
}

if(document.URL.indexOf("profilsidebar") >= 0
|| document.URL.indexOf("commandes") >= 0
|| document.URL.indexOf("changemdp") >= 0) {
  document.querySelector('footer').style.display="none";
}
