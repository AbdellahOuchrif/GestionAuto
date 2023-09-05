@extends('layouts.app')

@section("css")
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
@endsection

@section('content')
    <!-- This is to view the edits made on the canvas , use some of this code in the location and vehicule views --> 
    <div class="row">
        <div class="col">
            <div class="canvas-container">
                <div class="cursor small"></div>
                <img id="car-image" src="{{ asset('images/vue_croque_voiture.png') }}">
                <canvas id="canvas" width="500" height="329"></canvas>
                <input type="hidden" name="canvas_data" id="canvas_data">
                <br>
            </div>
            <div class="d-flex justify-content-between canvas-button-container mt-2">
                <button type="button" id="clear-button" data-toggle="tooltip" data-placement="bottom" title="Effacer Tout" class="btn btn-outline-primary"><span class="material-symbols-outlined">
                    delete_forever
                    </span></button>
                <button type="button" id="color-black" data-toggle="tooltip" data-placement="bottom" title="Noir" class="btn btn-outline-dark"><span class="material-symbols-outlined">
                    brush
                    </span></button>
                <button type="button" id="color-red" data-toggle="tooltip" data-placement="bottom" title="Rouge" class="btn btn-outline-danger"><span class="material-symbols-outlined">
                    brush
                    </span></button>
                <button type="button" id="color-yellow" data-toggle="tooltip" data-placement="bottom" title="Jaune" class="btn btn-outline-warning"><span class="material-symbols-outlined">
                    brush
                    </span></button>
                <button type="button" id="eraser-button" data-toggle="tooltip" data-placement="bottom" title="Gomme" class="btn btn-outline-secondary"><span class="material-symbols-outlined">
                    layers_clear
                    </span></button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

<script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip();
    })

		// Récupération du contexte de dessin
		const canvas = document.getElementById('canvas');
		const context = canvas.getContext('2d');
        const canvasContainer = document.querySelector('.canvas-container');
        const cursorSmall = document.querySelector('.small');
        const canvasRect = canvas.getBoundingClientRect();
        const cursorOffsetX = -3; // adjust this value to align the center of the custom cursor with the old cursor tip
        const cursorOffsetY = -3; // adjust this value to align the center of the custom cursor with the old cursor tip

        //set the dataURL on top of the canvas 

        const image = new Image();
        image.onload = function() {
            context.drawImage(image, 0, 0, canvas.width, canvas.height);
        };
        image.src = '{{ $canvas_data }}';

        const positionElement = (e) => {
            cursorSmall.style.display = "block";
            const mouseY = e.clientY;
            const mouseX = e.clientX;
            const canvasRect = canvas.getBoundingClientRect();
            const cursorX = mouseX - canvasRect.left + cursorOffsetX;
            const cursorY = mouseY - canvasRect.top + cursorOffsetY;
            cursorSmall.style.transform = `translate3d(${cursorX}px, ${cursorY}px, 0)`;
        }

        canvasContainer.addEventListener('mouseleave', function(e){
            cursorSmall.style.display = "none";
        });

        canvasContainer.addEventListener('mousemove', positionElement);
		// Initialisation des variables de dessin
		let isDrawing = false;
		let lastX = 0;
		let lastY = 0;
		let brushColor = 'black';

		// Gestionnaire d'événements pour le début du dessin
		canvas.addEventListener('mousedown', function(e) {
			isDrawing = true;
			lastX = e.offsetX;
			lastY = e.offsetY;
		});

		// Gestionnaire d'événements pour la fin du dessin
		canvas.addEventListener('mouseup', function(e) {
			isDrawing = false;
		});

		// Gestionnaire d'événements pour le dessin en mouvement
		canvas.addEventListener('mousemove', function(e) {
			if (!isDrawing) return;
				// Dessin de la ligne
				context.beginPath();
				context.moveTo(lastX, lastY);
				context.lineTo(e.offsetX, e.offsetY);
				context.strokeStyle = brushColor;
				context.stroke();

				// Mise à jour des variables de dessin
				lastX = e.offsetX;
				lastY = e.offsetY;
		});


        function resizeEraser(){
            cursorSmall.style.borderRadius = "50%";
            cursorSmall.style.borderWidth = "2px";
        }

		// Gestionnaire d'événements pour le bouton Effacer
		document.getElementById('clear-button').addEventListener('click', function() {
			context.clearRect(0, 0, canvas.width, canvas.height);
		});

		// Gestionnaire d'événements pour le bouton Effaceur
		document.getElementById('eraser-button').addEventListener('click', function() {
            brushColor = 'black';
            context.globalCompositeOperation = 'destination-out';
            context.strokeStyle = "rgba(0,0,0,0)";
            context.lineWidth = 4;
            cursorSmall.style.borderColor = brushColor;
            cursorSmall.style.borderRadius = "15%";
            cursorSmall.style.borderWidth = "1px";
		});

		// Gestionnaire d'événements pour les boutons de couleur
		document.getElementById('color-black').addEventListener('click', function() {
            context.globalCompositeOperation = 'source-over';
            context.lineWidth = 1;
			brushColor = 'black';
            cursorSmall.style.borderColor = brushColor;
            resizeEraser();
		});

		document.getElementById('color-red').addEventListener('click', function() {
            context.globalCompositeOperation = 'source-over';
            context.lineWidth = 1;
			brushColor = 'red';
            cursorSmall.style.borderColor = brushColor;
            resizeEraser();
		});

		document.getElementById('color-yellow').addEventListener('click', function() {
            context.globalCompositeOperation = 'source-over';
            context.lineWidth = 1;
			brushColor = 'yellow';
            cursorSmall.style.borderColor = brushColor;
            resizeEraser();
		});

        //Save Canvas

        function updateCanvasData(event){
            var dataURL = canvas.toDataURL();
            //document.getElementById("canvas_data").value = dataURL;
            console.log("updated");
            console.log(dataURL);
            console.log(dataURL === document.getElementById("canvas_data").value);
        }

        document.getElementById('eraser-button').addEventListener('click', updateCanvasData);




</script>
@endpush