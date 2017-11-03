<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}" >

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            #submit-all {
                display: none;
            }

            .dz-remove {
                padding: 5px;
                background-color: red;
                border-radius: 5px;
                margin-top: 5px;
                color: white;
                text-decoration: none;
            }
            
        </style>
    </head>
    <body>

        <form action="subir-imagen" class="dropzone" id="my-dropzone">
                {{ csrf_field() }}
        </form>

        <div class="meter">
        <span style="width: 25%"></span>
        </div>        

        <button id="submit-all">Submit all files</button>        

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-2.2.4.min.js" ></script>
        <script src="{{ asset('js/dropzone.min.js') }}"></script>
        <script>
                Dropzone.options.myDropzone = {
                    
                      // Prevents Dropzone from uploading dropped files immediately
                      autoProcessQueue: false,
                      paramName: "file",
                      maxFilesize: 5,      
                      resizeWidth: 300, resizeHeight: 300,
                      resizeMethod: 'contain', resizeQuality: 1.0,    
                      //uploadMultiple:true,
                      parallelUploads: 6,
                      maxFiles: 6,
                      acceptedFiles: 'image/*',
                      addRemoveLinks: true,
                      capture: 'image/',
                      dictDefaultMessage: 'Arrastra tus imagenes aquí para agregarlas a tu espacio (máximo 6 imágenes)',
                      dictFileTooBig: 'El archivo es muy grande, máx. 5mb',
                      dictInvalidFileType:'Se permiten solo archivos de imagen',
                      dictRemoveFile: 'Quitar archivo',
                      dictCancelUpload: 'Cancelar subida',
                      dictMaxFilesExceeded: 'Máximo de archivos a subir son 6',
                    
                      init: function() {
                          
                        var submitButton = document.querySelector("#submit-all")
                            myDropzone = this; // closure
                    
                        submitButton.addEventListener("click", function() {
                          myDropzone.processQueue(); // Tell Dropzone to process all queued files.
                        });
                    
                        // You might want to show the submit button only when 
                        // files are dropped here:
                        this.on("addedfile", function() {
                            $("#submit-all").fadeIn();
                          // Show submit button here and/or inform user to click it.
                        });

                        this.on("totaluploadprogress", function(progress) {
                            console.info(Date()+ '    ' +progress);
                        });                        
                    
                      }
                      
                };          
        </script>

    </body>
</html>
