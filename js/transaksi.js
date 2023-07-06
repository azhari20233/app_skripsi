var cetak = document.getElementById('cetak');
var ikonbtn  = document.querySelectorAll('#ikonbtn2');
var paging  = document.querySelectorAll('#paging'); 
cetak.addEventListener('click', function(){
  document.getElementById('fpencarian').style.display = 'none';
  document.querySelector('h2').style.display = 'none';
  document.getElementById('ikonbtn').style.display = 'none';
  document.querySelector('.container button.btn:nth-child(6)').style.display = 'none';
  document.querySelector('.container button.btn:nth-child(7)').style.display = 'none';
  document.querySelector('.container button.btn:nth-child(5)').style.display = 'none';
  document.querySelector('.container button.btn:nth-child(8)').style.display = 'none';
  ikonbtn.forEach(function(e){ e.style.display = 'none'; });
  paging.forEach(function(e){ e.style.display = 'none'; });
  window.print();
  setTimeout(nonggol, 50);
});

function nonggol(){
  document.getElementById('fpencarian').style.display = '';
  document.querySelector('h2').style.display = '';
  document.getElementById('ikonbtn').style.display = '';
  document.querySelector('.container button.btn:nth-child(6)').style.display = '';
  document.querySelector('.container button.btn:nth-child(7)').style.display = '';
  document.querySelector('.container button.btn:nth-child(5)').style.display = '';
  document.querySelector('.container button.btn:nth-child(8)').style.display = '';
  ikonbtn.forEach(function(e){ e.style.display = ''; });
  paging.forEach(function(e){ e.style.display = ''; });
}