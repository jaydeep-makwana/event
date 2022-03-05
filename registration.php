 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="./assets/./CSS/./style.css">
     <link rel="stylesheet" href="./assets/./bootstrap-4.6.1-dist/./css/./bootstrap.min.css">
     <title>Registration</title>
 </head>


 <body>
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a class="navbar-brand" href="#">Navbar</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav mr-auto">
                 <li class="nav-item active">
                     <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">Link</a>
                 </li>
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                         Dropdown
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                         <a class="dropdown-item" href="#">Action</a>
                         <a class="dropdown-item" href="#">Another action</a>
                         <div class="dropdown-divider"></div>
                         <a class="dropdown-item" href="#">Something else here</a>
                     </div>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link disabled">Disabled</a>
                 </li>
             </ul>
             <form class="form-inline my-2 my-lg-0">
                 <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                 <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
             </form>
         </div>
     </nav>

     <div class="container border mt-5 w-50">
         <form>

             <div class="form-group ">
                 <label for="fullName">Full Name</label>
                 <input type="email" class="form-control" id="fullName" aria-describedby="emailHelp">
                 <small id="emailHelp" class="text-danger  "></small>
             </div>

             <div class="form-group ">
                 <label for="rollNo">Roll No.</label>
                 <input type="number" class="form-control" id="rollNo" aria-describedby="emailHelp">
                 <small id="emailHelp" class="text-danger  "></small>
             </div>

             <div class="form-group ">
                 <select class="form-control">
                     <option selected disabled>Standard</option>
                     <option value="1">1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
                     <option value="5">5</option>
                     <option value="6">6</option>
                     <option value="7">7</option>
                     <option value="8">8</option>
                     <option value="9">9</option>
                     <option value="10">10</option>
                     <option value="11">11</option>
                     <option value="12">12</option>

                 </select>
             </div>

             <div class="form-group ">
                 <select class="form-control">
                     <option selected disabled>Select Event</option>
                     <option value="birthday">birthday</option>
                     <option value="engagement">engagement</option>
                 </select>
             </div>

             <div class="form-group">
                 <div class="btn-group btn-group-toggle" data-toggle="buttons">
                     <label class="btn btn-secondary active">
                         <input type="radio" name="options" value="male" id="option1" checked> Male
                     </label>
                     <label class="btn btn-secondary">
                         <input type="radio" name="options" value="female" id="option2"> Female
                     </label>
                 </div>
             </div>




             <button type="submit" class="btn btn-primary">Submit</button>
         </form>
     </div>
 </body>

 </html>