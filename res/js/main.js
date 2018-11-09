AFRAME.registerComponent('sign-text', {
	schema: {
    	id: {type: 'string', default: 'id'}
  	},

	init: function () {
		var data = this.data;
		var el = this.el;

		el.addEventListener('mouseenter', function () {
			el.setAttribute('color', "#555");
			//console.log('enter ' + data.id);
			show_popup(data.id);
			var title = document.querySelector('#title');
			title.innerHTML = data.id;
			
		});
		
		el.addEventListener('mouseleave', function () {
			el.setAttribute('color', "#ccc");
			//console.log('leave' + data.id);
			hide_popup();
		});
		
	}
});

console.log(document.querySelector('#document'));

function show_popup(id) {
	var body = document.querySelector('#popup_body');
	body.style.top = '0';
	console.log(id);
	if (id == 'workshop') {
		document.querySelector('#workshop_body').style.display = 'block';
	} else if (id == 'courtyard') {
		document.querySelector('#courtyard_body').style.display = 'block';
	} else if (id == 'cafe') {
		document.querySelector('#cafe_body').style.display = 'block';
	} else if (id == 'library') {
		document.querySelector('#library_body').style.display = 'block';
	} else if (id == 'exhibition') {
		document.querySelector('#exhibition_body').style.display = 'block';
	}
}

function hide_popup() {
	var body = document.querySelector('#popup_body');
	body.style.top = '100%';
	document.querySelectorAll('.content').forEach(el => {
        el.style.display = 'none';
    });
}