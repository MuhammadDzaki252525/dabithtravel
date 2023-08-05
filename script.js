document.getElementById('next').onclick = function(){
	const widthImage = document.querySelector("#in_card2").offsetWidth;
	document.getElementById('image_2').scrollLeft += widthImage;
}
document.getElementById('prev').onclick = function(){
	const widthImage = document.querySelector("#in_card2").offsetWidth;
	document.getElementById('image_2').scrollLeft -= widthImage;
}

function toggleMobileMenu(menu){
	menu.classList.toggle('open')
	console.log('button berhasil');
}

let prevScrolltos = window.pageYOffset;

window.onscroll = function(){
	let currentScrollpos = window.pageYOffset;
	
	if (prevScrolltos > currentScrollpos) {
		document.getElementById("navbar").style.top = "0";
	}else {
		document.getElementById("navbar").style.top = "-120px";
	}
	prevScrolltos = currentScrollpos;
};
