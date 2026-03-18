const button = document.querySelector('.burger-button');
const button2 = document.querySelector('.burger-button-menu');
button.addEventListener('click', event => {
  var state = document.getElementById('burger').style.display;
  if (state === 'inline-block') {
    document.getElementById('burger').style.animation = 'close 1s ease-in-out';
    setTimeout(() => {
      document.getElementById('burger').style.display = "none";
    }, 1000);
  } else {
    document.getElementById('burger').style.animation = 'fill 1s ease-in-out';
    document.getElementById('burger').style.display = "inline-block";
  }
});
button2.addEventListener('click', event => {
  var state = document.getElementById('burger').style.display;
  if (state === 'inline-block') {
    document.getElementById('burger').style.animation = 'close 1s ease-in-out';
    setTimeout(() => {
      document.getElementById('burger').style.display = "none";
    }, 1000);
  } else {
    document.getElementById('burger').style.animation = 'fill 1s ease-in-out';
    document.getElementById('burger').style.display = "inline-block";
  }
});
