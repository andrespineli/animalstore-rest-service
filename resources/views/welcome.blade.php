<!DOCTYPE html>
<html>
  <head>
      <title>AnimalStore</title>
    <meta charset="utf-8">
    <meta name="description" content="AnimalStore RESTful WebAPI" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.28/css/uikit.min.css" />
    <!-- jQuery is required -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- UIkit JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.28/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.28/js/uikit-icons.min.js"></script>
  </head>
  <body>
    <nav class="uk-navbar-container uk-margin" uk-navbar>
        <div class="uk-navbar-center">
            <a class="uk-navbar-item uk-logo" href="#">
                  <h2>AnimalStore</h2>
            </a>
        </div>
    </nav>
    <center>
      <h3 class="uk-card-title">RESTful WebAPI</h3>
      <br>
      <span class="uk-label uk-label-success">GET</span>
      <span class="uk-label">POST</span>
      <span class="uk-label uk-label-warning">PUT</span>
      <span class="uk-label uk-label-warning">PATCH</span>
      <span class="uk-label uk-label-danger">DELETE</span>
    </center>    

    <div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>
        <div>           
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-body">
                <h5 class="uk-card-title">ROUTES</h5>
                 <ul class="uk-list uk-list-divider">
                  <li><a href="v1/clinics">/clinics</a></li>
                  <li><a href="v1/clinics">/clinics/login</a></li>
                  <li><a href="v1/clinics">/clinics/:id</a></li>
                  <li><a href="v1/clinics">/clinics/:id/user</a></li>
                  <li><a href="v1/vets">/vets</a></li>
                  <li><a href="v1/vets">/vets/:id</a></li>
                  <li><a href="v1/owners">/owners</a></li>
                  <li><a href="v1/owners">/owners/:id</a></li>
                  <li><a href="v1/animals/types">/animals/types</a></li>
                  <li><a href="v1/animals/types">/animals/types/:id</a></li>
                  <li><a href="v1/animals/breeds">/animals/breeds</a></li>
                  <li><a href="v1/animals/breeds">/animals/breeds/:id</a></li>
                  <li><a href="v1/animals">/animals</a></li>
                  <li><a href="v1/animals">/animals/:id</a></li>
                  <li><a href="v1/appointments">/appointments</a></li>
                  <li><a href="v1/appointments">/appointments/:id</a></li>
                </ul>
            </div>
        </div>
        <div>           
        </div>
    </div>
 
  <nav class="tm-navbar uk-navbar">  
    <div data-uk-sticky >  
      <div class="uk-container uk-container-middle"> 
        <div class="uk-position-center"> 
          AnimalStore/UPAPP | www.upapp.com.br
        </div> 
      </div>  
    </div>
  </nav>
  

  </body>
</html>
