// function alert1(){
// 	swal("Data Terhapus!", "Klik OK!", "success");
// 	var ahay = document.querySelector('.swal-button');
// 	ahay.addEventListener('click',function(){
// 		window.location.href="http://julikoding.blogspot.com";
// 		// window.location.href="hapustransaksi.php?nama_customer=<?php echo $baris['nama_customer']; ?>";
// 	})
// }

var ktabel = document.querySelectorAll('.thead-dark tr th a');
ktabel.forEach(function(e){
	e.style.textDecoration = 'none';

	e.addEventListener('change',function(){
		preventDefault();
	});

	e.addEventListener('mouseenter',function(){
		e.style.color = 'grey';
	});

	e.addEventListener('mouseleave',function(){
		e.style.color = 'white';
	});

});

function tesalert(){
	swal("A wild Pikachu appeared! What do you want to do?", {
  buttons: {
    cancel: "Run away!",
    catch: {
      text: "Throw Pokéball!",
      value: "catch",
    },
    defeat: true,
  },
})
.then((value) => {
  switch (value) {
 
    case "defeat":
      swal("Pikachu fainted! You gained 500 XP!");
      break;
 
    case "catch":
      swal("Gotcha!", "Pikachu was caught!", "success");
      break;
 
    default:
      swal("Got away safely!");
  }
});
}