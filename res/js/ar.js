var app_root = 'http://localhost/tourgo-system/stem_ar_tour/';

AFRAME.registerComponent('detect-marker', {
	schema: {
		id: {type: 'string', default: 'id'}
	},

	tick: function () {
		var data = this.data;
		var marker = document.querySelector('#' + data.id);

		if(marker.object3D.visible == true) {
			console.log(data.id + ' exist');
			marker_found();
		} else {
			console.log(data.id + ' not exist');
			marker_wait()
		}

	}
});

function marker_wait() {
	var wait = document.querySelector('#checkpoint_wait');
	var menu = document.querySelector('#checkpoint_menu');
	wait.style.display = 'block';
	menu.style.display = 'none';
}

function marker_found() {
	var wait = document.querySelector('#checkpoint_wait');
	var menu = document.querySelector('#checkpoint_menu');
	wait.style.display = 'none';
	menu.style.display = 'block';
}

function start_animation(model) {
	console.log('playing');
	if (model.startsWith('#')) {
		//ID
		var model = document.querySelector(model);
		model.emit('play-animation');
	} else if (model.startsWith('.')) {
		//CLASS
		document.querySelectorAll(model).forEach(el => {
			el.emit('play-animation');
		});
	}	
	
}

function start_explain() {
	console.log('explain');

	var body = document.querySelector('#checkpoint_body');
	var explain = document.querySelector('#explain_body');
	var quiz = document.querySelector('#quiz_body');

	body.style.top = '0';
	explain.style.display = 'block';
	quiz.style.display = 'none';
}

function start_quiz() {
	console.log('quiz');

	var body = document.querySelector('#checkpoint_body');
	var explain = document.querySelector('#explain_body');
	var quiz = document.querySelector('#quiz_body');

	body.style.top = '0';
	explain.style.display = 'none';
	quiz.style.display = 'block';
}

function close_body() {
	var block = document.querySelector('#checkpoint_body');
	block.style.top = '100%';
}

function answer_check(option, nexpoint) {
	var opt = document.querySelector('#ans_opt');
	var ans = document.querySelector('#answer');
	ans.style.display = 'block';
	opt.style.display = 'none';

	var total_points = getQueryVariable('points');
	if (total_points == false) {
		total_points = 0;
	}
	console.log('Base Points : ' + total_points);

	var right = document.querySelectorAll('.ans_right');
	var left = document.querySelectorAll('.ans_false');

	if (option == true) {
		total_points = parseInt(total_points, 10) + 10;
		right.forEach(el => {
        	el.style.display = 'block';
    	});
	} else {
		total_points = parseInt(total_points, 10) + 5;
		left.forEach(el => {
        	el.style.display = 'block';
    	});
	}

	console.log('Total Points : ' + total_points);
	next_url(total_points, nexpoint);

}

function getQueryVariable(variable)
{
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i=0;i<vars.length;i++) {
            var pair = vars[i].split("=");
            if(pair[0] == variable){return pair[1];}
    }
    return(false);
}

function next_url(total_p, nexpoint) {
	var url = document.querySelectorAll('#next-url');
	url.forEach(el => {
        el.href = app_root + nexpoint + '.php?points=' + total_p;
    });
}