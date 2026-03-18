var edit;
var reset;

function fetchAllToppings() {
  var req = new XMLHttpRequest();
  req.addEventListener("load", displayBbtCart);
  req.open("GET", "http://localhost:8000/api/fetchAllToppings");
  req.send();

  var req = new XMLHttpRequest();
  req.addEventListener("load", displayBbtSizes);
  req.open("GET", "http://localhost:8000/api/fetchAllSizes");
  req.send();
}

function displayBbtSizes() {
  var jsonBBT = localStorage.getItem('cart-bbt');
  if (jsonBBT !== null) {
    var allsizes = JSON.parse(this.responseText);
    var i = 1;
    jsonBBT = JSON.parse(localStorage.getItem('cart-bbt'));
    jsonBBT.forEach(element => {
      for (let index = 0; index < allsizes.length; index++) {
        var input = document.getElementsByName("product_sizes"+i)[index];
        input.value = allsizes[index].id;
        var input = document.getElementsByName("product_sizes"+allsizes[index].id.toString()+i)[0];
        input.value = allsizes[index].price;
        var label = document.getElementById("label_sizes"+allsizes[index].id.toString()+i);
        label.innerHTML = allsizes[index].name;
      }
      i++;
    });
  }
}

function createDisplayImg(element, mydiv, mydivcolimage) {
  mydivcolimage.setAttribute('class','col-lg-3');
  var myimg = document.createElement('img');
  myimg.setAttribute('src', element.url);
  myimg.setAttribute('width','100%');
  myimg.setAttribute('height','100%');
  mydivcolimage.append(myimg);
  mydiv.append(mydivcolimage);
  return mydiv;
}

function createInputHiddenIdAndName(element, mydivcol,i) {
  var label = document.createElement('label');
  label.setAttribute('style','font-size:1.2rem;')
  label.innerHTML = element.name;
  mydivcol.append(label);
  var mybr = document.createElement('br');
  mydivcol.append(mybr);

  var input = document.createElement('input');
  input.setAttribute('type','hidden');
  input.setAttribute('name','id'+i);
  input.setAttribute('value',element.id);
  mydivcol.append(input);

  var input = document.createElement('input');
  input.setAttribute('type','hidden');
  input.setAttribute('name','name'+i);
  input.setAttribute('value',element.name);
  mydivcol.append(input);
  return mydivcol;
}

function createInputSizes(element, mydivrowincart1,i) {
  var label = document.createElement('label');
  label.innerHTML = "Tailles";
  label.setAttribute('style','font-weight:bold');
  mydivrowincart1.append(label);
  var mybr = document.createElement('br');
  mydivrowincart1.append(mybr);
  for (let pas = 1; pas <= 3; pas++) {
    var input = document.createElement('input');
    input.setAttribute('type','radio');
    input.setAttribute('name','product_sizes'+i);
    if (element.product_sizes === pas) {
      input.checked = true;
    }
    input.setAttribute('value','');
    mydivrowincart1.append(input);
    var input = document.createElement('input');
    input.setAttribute('type','hidden');
    input.setAttribute('name','product_sizes'+pas.toString()+i);
    input.setAttribute('value','');
    mydivrowincart1.append(input);
    var label = document.createElement('label');
    label.setAttribute('id','label_sizes'+pas.toString()+i);
    label.innerHTML = '';
    mydivrowincart1.append(label);
    var mybr = document.createElement('br');
    mydivrowincart1.append(mybr);
  }
  return mydivrowincart1;
}

function createInputToppings(alltoppings, element, mydivrowincart2,i) {
  var label = document.createElement('label');
  label.innerHTML = "Toppings";
  label.setAttribute('style','font-weight:bold');
  mydivrowincart2.append(label);
  var mybr = document.createElement('br');
  mydivrowincart2.append(mybr);
  for (index = 0; index < alltoppings.length; index++) {
    var input = document.createElement('input');
    input.setAttribute('type','radio');
    input.setAttribute('name','toppings'+i);
    if (element.toppings === index+1) {
      input.checked = true;
    }
    input.setAttribute('value',alltoppings[index].id);
    mydivrowincart2.append(input);
    var input = document.createElement('input');
    input.setAttribute('type','hidden');
    input.setAttribute('name','toppings'+(index+1)+i);
    input.setAttribute('value',alltoppings[index].price);
    mydivrowincart2.append(input);
    var label = document.createElement('label');
    label.innerHTML = alltoppings[index].name;
    mydivrowincart2.append(label);
    var mybr = document.createElement('br');
    mydivrowincart2.append(mybr);
  }
  return mydivrowincart2;
}

function createInputSucres(element, mydivrowincart3, i) {
  var label = document.createElement('label');
  label.innerHTML = "Sucres"
  label.setAttribute('style','font-weight:bold');
  mydivrowincart3.append(label);
  var mybr = document.createElement('br');
  mydivrowincart3.append(mybr);

  var input = document.createElement('input');
  input.setAttribute('type','radio');
  input.setAttribute('name','sucres'+i);
  if (element.sucres === 0) {
    input.checked = true;
  }
  input.setAttribute('value','0');
  mydivrowincart3.append(input);
  var label = document.createElement('label');
  label.innerHTML = "0%"
  mydivrowincart3.append(label);
  var mybr = document.createElement('br');
  mydivrowincart3.append(mybr);

  var input = document.createElement('input');
  input.setAttribute('type','radio');
  input.setAttribute('name','sucres'+i);
  if (element.sucres === 25) {
    input.checked = true;
  }
  input.setAttribute('value','25');
  mydivrowincart3.append(input);
  var label = document.createElement('label');
  label.innerHTML = "25%"
  mydivrowincart3.append(label);
  var mybr = document.createElement('br');
  mydivrowincart3.append(mybr);

  var input = document.createElement('input');
  input.setAttribute('type','radio');
  input.setAttribute('name','sucres'+i);
  if (element.sucres === 50) {
    input.checked = true;
  }
  input.setAttribute('value','50');
  mydivrowincart3.append(input);
  var label = document.createElement('label');
  label.innerHTML = "50%"
  mydivrowincart3.append(label);
  var mybr = document.createElement('br');
  mydivrowincart3.append(mybr);

  var input = document.createElement('input');
  input.setAttribute('type','radio');
  input.setAttribute('name','sucres'+i);
  if (element.sucres === 75) {
    input.checked = true;
  }
  input.setAttribute('value',"75");
  mydivrowincart3.append(input);
  var label = document.createElement('label');
  label.innerHTML = "75%"
  mydivrowincart3.append(label);
  var mybr = document.createElement('br');
  mydivrowincart3.append(mybr);

  var input = document.createElement('input');
  input.setAttribute('type','radio');
  input.setAttribute('name','sucres'+i);
  if (element.sucres === 100) {
    input.checked = true;
  }
  input.setAttribute('value','100');
  mydivrowincart3.append(input);
  var label = document.createElement('label');
  label.innerHTML = "100%"
  mydivrowincart3.append(label);
  var mybr = document.createElement('br');
  mydivrowincart3.append(mybr);
  return mydivrowincart3;
}

function supprimerBbt(i) {
  var jsonBBT = JSON.parse(localStorage.getItem('cart-bbt'));
  var myarray=[];
  var index = 1;
  jsonBBT.forEach(element => {
    if (index !== i) {
      myarray.push(element);
    }
    index++;
  });
  console.log(myarray);
  localStorage.setItem('cart-bbt', JSON.stringify(myarray));
  fetchAllToppings();
}

function createInputQuantity(element,mydivcol,i) {
  var mydivrowend = document.createElement('div');
  mydivrowend.setAttribute('class','row');
  var mydivrowendcol1 = document.createElement('div');
  mydivrowendcol1.setAttribute('class','col');
  var mydivrowendcol2 = document.createElement('div');
  mydivrowendcol2.setAttribute('class','col');
  var myspan = document.createElement('span');
  myspan.innerHTML = "Quantity : ";
  myspan.setAttribute('style','font-weight:bold;');

  var inputquantity = document.createElement('input');
  inputquantity.setAttribute('type','number');
  inputquantity.setAttribute('name','quantity'+i);
  inputquantity.setAttribute('min','0');
  inputquantity.setAttribute('max','10');
  inputquantity.setAttribute('value',element.quantity);
  inputquantity.setAttribute('style','width:7rem;display:inline;');
  inputquantity.setAttribute('class','form-control');

  mydivrowendcol1.append(myspan);
  mydivrowendcol1.append(inputquantity);

  var myi = document.createElement('i');
  myi.setAttribute('class','fa-solid fa-xmark');
  myi.setAttribute('style','color:red;font-size:2rem;cursor:pointer;');
  myi.setAttribute('onclick','return supprimerBbt('+i+');');

  mydivrowendcol2.append(myi);

  mydivrowend.append(mydivrowendcol1);
  mydivrowend.append(mydivrowendcol2);

  mydivcol.append(mydivrowend);
  return mydivcol;
}

function createDisplayPrice(element, cart_checkout_form1, mydivcol, i) {
  var input = document.createElement('input');
  input.setAttribute('type','hidden');
  input.setAttribute('name','price'+i);
  input.setAttribute('value',element.price);
  cart_checkout_form1.append(input);
  var myspan = document.createElement('span');
  myspan.innerHTML = "Price : " + element.price + "€";
  myspan.setAttribute('style','font-weight:bold');
  mydivcol.append(myspan);
  return mydivcol;
}

function createDisplayButtons(cart_checkout_form1) {
  var total_price = getTotalPrice();
  var input = document.createElement('input');
  input.setAttribute('type','hidden');
  input.setAttribute('name','total_price');
  input.setAttribute('value',total_price);
  cart_checkout_form1.append(input);
  var myhr = document.createElement('hr');
  cart_checkout_form1.append(myhr);
  var button = document.createElement("button");
  button.setAttribute('id', 'btn-edit');
  button.setAttribute('class', 'btn btn-primary btn-block');
  button.setAttribute('type', 'submit');
  button.innerHTML = "Editer";
  cart_checkout_form1.append(button);
  button = document.createElement("button");
  button.setAttribute('id', 'btn-reset');
  button.setAttribute('class', 'btn btn-danger btn-block');
  button.innerHTML = "Vider le panier";
  cart_checkout_form1.append(button);
  return cart_checkout_form1;
}

function displayBbtCart() {
  var cart_checkout_form1 = document.getElementsByClassName("cart-checkout-form1")[0];
  if (cart_checkout_form1 !== undefined) {
    cart_checkout_form1.innerHTML = '';
    var jsonBBT = JSON.parse(localStorage.getItem('cart-bbt'));
    var i = 1;
    if (jsonBBT === null || jsonBBT.length === 0) {
      var myp = document.createElement('p');
      myp.innerHTML = "Vous n'avez rien dans le panier !"
      cart_checkout_form1.append(myp);
      document.getElementsByClassName('total_price_span')[0].innerHTML = "0";
      document.getElementsByClassName('total_price_span')[1].innerHTML = "0";
    } else {
      var alltoppings = JSON.parse(this.responseText);
      var input = document.createElement('input');
      input.setAttribute('type','hidden');
      input.setAttribute('name','quantity');
      input.setAttribute('value',jsonBBT.length);
      cart_checkout_form1.append(input);
      jsonBBT.forEach(element => {
        var myhr = document.createElement('hr');
        cart_checkout_form1.append(myhr);
        var mydiv = document.createElement('div');
        mydiv.setAttribute('class','row displayBbtRow'+i);
        mydiv.setAttribute('style','display: flex;justify-content: center;align-items: center;');
        cart_checkout_form1.append(mydiv);

        var mydiv = document.getElementsByClassName('displayBbtRow'+i)[0];

        var mydivcolimage = document.createElement('div');
        mydiv = createDisplayImg(element, mydiv, mydivcolimage);

        var mydivcol = document.createElement('div');
        mydivcol.setAttribute('class','col-lg-9');
        mydivcol.setAttribute('style','text-align:center');
        var mybr = document.createElement('br');
        var myhr = document.createElement('hr');

        var mydivrowincart = document.createElement('div');
        mydivrowincart.setAttribute('class','row');
        var mydivrowincart1 = document.createElement('div');
        mydivrowincart1.setAttribute('class','col');
        var mydivrowincart2 = document.createElement('div');
        mydivrowincart2.setAttribute('class','col');
        var mydivrowincart3 = document.createElement('div');
        mydivrowincart3.setAttribute('class','col');
        
        //Création des inputs cachés
        mydivcol = createInputHiddenIdAndName(element, mydivcol,i);

        //Créer élément input pour les tailles
        mydivrowincart1 = createInputSizes(element, mydivrowincart1,i);

        //Créer élément input pour les toppings
        mydivrowincart2 = createInputToppings(alltoppings, element, mydivrowincart2,i);

        mydivrowincart.append(mydivrowincart1);
        mydivrowincart.append(mydivrowincart2);

        //Créer élément input pour les sucres
        mydivrowincart3 = createInputSucres(element, mydivrowincart3, i);

        mydivrowincart.append(mydivrowincart3);
        mydivcol.append(mydivrowincart);
  
        // Affichage du prix total de la boisson
        mydivcol = createDisplayPrice(element, cart_checkout_form1, mydivcol, i);

        var mybr = document.createElement('br');
        mydivcol.append(mybr);
        var mybr = document.createElement('br');
        mydivcol.append(mybr);
  
        // Création de l'input quantity
        mydivcol = createInputQuantity(element, mydivcol, i);
        
        i++;
        mydiv.append(mydivcol);
        mydiv.append(mybr);
      });
      cart_checkout_form1 = createDisplayButtons(cart_checkout_form1);
      edit = document.getElementById('btn-edit');
      edit.addEventListener('click', editBbt);
      reset = document.getElementById('btn-reset');
      reset.addEventListener('click', supprimerPanier);
      var total_price = getTotalPrice();
      document.getElementsByClassName('total_price_span')[0].innerHTML = total_price;
      document.getElementsByClassName('total_price_span')[1].innerHTML = total_price;
    }
  }
}


function closeNotifications(string,id) {
  if (id === null) {
    if (string === 'success') {
      document.getElementById('popups-afterbuy').children[0].style.display = "none";
    } else if (string === 'danger') {
      document.getElementById('popups-afterbuy').children[1].style.display = "none";
    } else if (string === 'missing-cart') {
      document.getElementById('popups-afterbuy').children[2].style.display = "none";
    } else if (string === 'success-checkout') {
      document.getElementById('popups-afterbuy').children[3].style.display = "none";
    }
  } else {
    if (string === 'success') {
      document.getElementById('popups-afterbuy-'+id).children[0].style.display = "none";
    } else if (string === 'danger') {
      document.getElementById('popups-afterbuy-'+id).children[1].style.display = "none";
    }
  }
}

function checkout(e) {
  e.preventDefault();
  if (localStorage.getItem('cart-bbt') && localStorage.getItem('cart-bbt') !== '[]') {
    localStorage.removeItem('cart-bbt');
    e.currentTarget.submit();
  } else {
    document.getElementById('popups-afterbuy').children[2].style.display = "inline-block";
    setTimeout(() => {
      document.getElementById('popups-afterbuy').children[2].style.display = "none";
    }, 2000);
  }
  fetchAllToppings();
}

function supprimerPanier(e) {
  e.preventDefault();
  localStorage.removeItem('cart-bbt');
  fetchAllToppings();
  document.getElementsByClassName('total_price_span')[0].innerHTML = 0;
  document.getElementsByClassName('total_price_span')[1].innerHTML = 0;
  document.getElementById('popups-afterbuy').children[1].style.display = "inline-block";
  setTimeout(() => {
    document.getElementById('popups-afterbuy').children[1].style.display = "none";
  }, 2000);
}

//ajoutBbtTest();
function ajoutBbt(e, id) {
  e.preventDefault();
  if (document.querySelector('input[name="sucres'+id+'"]:checked') === undefined
  || document.querySelector('input[name="toppings'+id+'"]:checked') === undefined
  || document.querySelector('input[name="product_sizes'+id+'"]:checked') === undefined
  || document.querySelector('input[name="sucres'+id+'"]:checked') === null
  || document.querySelector('input[name="toppings'+id+'"]:checked') === null
  || document.querySelector('input[name="product_sizes'+id+'"]:checked') === null) {
    document.getElementById('popups-afterbuy-'+id).children[1].style.display = "inline-block";
    setTimeout(() => {
      document.getElementById('popups-afterbuy-'+id).children[1].style.display = "none";
    }, 2000);
  } else {
    var objectString = JSON.stringify({ id: parseInt(document.querySelector('input[name="product_id'+id+'"]').value),
    name: document.getElementsByName('product_name'+id)[0].value,
    product_sizes:parseInt(document.querySelector('input[name="product_sizes'+id+'"]:checked').value),
    product_sizes_price:parseFloat(document.querySelector('input[name="product_sizes'+document.querySelector('input[name="product_sizes'+id+'"]:checked').value+id+'"]').value),
    product_price: parseFloat(document.getElementsByName('product_price'+id)[0].value),
    description: document.getElementsByName('description'+id)[0].value,
    url: document.getElementsByName('url'+id)[0].value,
    sucres: parseInt(document.querySelector('input[name="sucres'+id+'"]:checked').value),
    toppings: parseInt(document.querySelector('input[name="toppings'+id+'"]:checked').value),
    toppings_price: parseFloat(document.querySelector('input[name="toppings'+document.querySelector('input[name="toppings'+id+'"]:checked').value+id+'"]').value),
    price: 0,
    quantity:1,
    });
    const json = JSON.parse(objectString);
    json.price = (json.product_price + json.toppings_price + json.product_sizes_price) * json.quantity ;
    myarray = [];
    if(localStorage.getItem('cart-bbt')) {
      var found = false;
      myarray = JSON.parse(localStorage.getItem('cart-bbt'));
      for (i = 0; i < myarray.length; i++) {
        if (json.id === myarray[i].id
          && json.name === myarray[i].name
          && json.product_sizes === myarray[i].product_sizes
          && json.sucres === myarray[i].sucres
          && json.toppings === myarray[i].toppings
          && json.product_price === myarray[i].product_price) {
          myarray[i].quantity += 1;
          myarray[i].price = (myarray[i].product_price + myarray[i].toppings_price + myarray[i].product_sizes_price) * myarray[i].quantity;
          found = true;
        }
      }
      if (!found) {
        myarray.push(json);
      }
      found = false;
      localStorage.setItem('cart-bbt', JSON.stringify(myarray));
    } else {
      myarray.push(json);
      localStorage.setItem('cart-bbt', JSON.stringify(myarray));
    }
    //fetchAllToppings();
    
    document.getElementById('popups-afterbuy-'+id).children[0].style.display = "inline-block";
    setTimeout(() => {
      document.getElementById('popups-afterbuy-'+id).children[0].style.display = "none";
    }, 2000);
  }
}

function triBbt(e) {
  e.preventDefault();
  var jsonBBT = JSON.parse(localStorage.getItem('cart-bbt'));
  var jsonBBTlength = jsonBBT.length;
  var myarray = [];
  for (i = 0; i < jsonBBTlength; i++) {
    var product = jsonBBT[0];
      for (j = 1; j < jsonBBTlength; j++) {
        if (product.id === jsonBBT[j].id
          && product.name === jsonBBT[j].name
          && product.product_sizes === jsonBBT[j].product_sizes
          && product.toppings === jsonBBT[j].toppings
          && product.sucres === jsonBBT[j].sucres
          && product.product_price === jsonBBT[j].product_price) {
          product.quantity = jsonBBT[j].quantity + product.quantity;
          if (product.quantity > 10) {
            product.quantity = 10;
          }
          product.price = parseFloat(product.quantity * (product.toppings_price + product.product_price + product.product_sizes_price));
        }
      }
      myarray.push(product);
      var tempoBBT = jsonBBT;
      var jsonBBT = jsonBBT.filter(produit => produit.id !== product.id
        || produit.name !== product.name
        || produit.toppings !== product.toppings
        || produit.sucres !== product.sucres
        || produit.product_price !== product.product_price);
      jsonBBTlength = jsonBBT.length;
    
    if (jsonBBT === tempoBBT) {
      i = jsonBBTlength;
    } else if (jsonBBTlength !== i) {
      i = -1;
    }
  }
  localStorage.setItem('cart-bbt', JSON.stringify(myarray));
  if (JSON.stringify(myarray) === '[]') {
    localStorage.removeItem('cart-bbt');
    document.getElementsByClassName('total_price_span')[0].innerHTML = 0;
    document.getElementsByClassName('total_price_span')[1].innerHTML = 0;
  }
  fetchAllToppings();
}
function getTotalPrice() {
  var myarray = JSON.parse(localStorage.getItem('cart-bbt'));
  var total_price = 0;
  for (i = 0; i < myarray.length; i++) {
    total_price+=myarray[i].price;
  }
  return total_price;
}
function editBbt(e) {
  e.preventDefault();
  var jsonBBT = JSON.parse(localStorage.getItem('cart-bbt'));
  var i = 1;
  var myarray = [];
  jsonBBT.forEach(element => {
    element.product_sizes = parseInt(document.querySelector('input[name="product_sizes'+i+'"]:checked').value);
    element.product_sizes_price = parseFloat(document.querySelector('input[name="product_sizes'+element.product_sizes+ i +'"]').value);
    element.toppings = parseInt(document.querySelector('input[name="toppings'+i+'"]:checked').value);
    element.toppings_price = parseFloat(document.querySelector('input[name="toppings'+element.toppings+ i +'"]').value);
    element.quantity = parseInt(document.querySelector('input[name="quantity'+i+'"]').value);
    element.price = (parseFloat(element.product_price) + element.product_sizes_price + element.toppings_price) * element.quantity;
    element.sucres = parseInt(document.querySelector('input[name="sucres'+i+'"]:checked').value);

    if (element.quantity !== 0) {
      myarray.push(element);
    }
    var total_price = getTotalPrice();
    document.getElementsByClassName('total_price_span')[0].innerHTML = total_price;
    i++;
  });
  localStorage.setItem('cart-bbt', JSON.stringify(myarray));
  triBbt(e);
  document.getElementById('popups-afterbuy').children[0].style.display = "inline-block";
  setTimeout(() => {
    document.getElementById('popups-afterbuy').children[0].style.display = "none";
  }, 2000);
}

if (window.location.href.indexOf("panier") > -1) {
  fetchAllToppings();
}
