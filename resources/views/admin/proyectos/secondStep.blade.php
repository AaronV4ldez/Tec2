
<div class="container-fluid col-sm-5 mx-auto rounded-1" style="border-color: black; border-radius:15px;"id="principal">                    
    <div class="input-group mb-3 pt-3">
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
        
    </div>
                          
    <div class="container">
        <div class="row align-items-start">
            <div class="col">
                <div class="mb-3">
                    <button type="AgregarD" class="btn btn-primary" style="background-color: #f0ad4e; border-color:black">Agregar docente colaborador</button>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <button type="AgregarA" class="btn btn-primary" style="background-color: #f0ad4e; border-color:black">Agregar alumno colaborador</button>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="form-floating mb-4">
            <textarea class="form-control" id="txtArea" rows="4"></textarea>
            <label for="floatingTextarea2">Descripcion</label>
        </div>
    </div>
    <label for="dob">Fecha de inicio</label>
    <input type="date" name="dob" id="dob"/>
    <!---------------------------------------------------------------------->
    <div class="container">
        <div class="row align-items-start">
            <div class="col">
                <div class="mb-3">
                    <button type="AgregarD" class="btn btn-primary" style="background-color: #f0ad4e; border-color:black; visibility:hidden">Agregar docente colaborador</button>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <button type="AgregarA" class="btn btn-primary" style="background-color: #f0ad4e; border-color:black; visibility:hidden;">Agregar alumno colaborador</button>
                </div>
            </div>
           
        </div>
    </div>
</div>
    <!---------------------Segundo form --------------------------------->
    <div class="container-fluid col-sm-5 mx-auto"style="display:none; border-radius: 15px; border-color: black;border-width: 5px 5px 5px;border-style: solid;"id="segunda">                    
        <div class="input-group mb-3 pt-3">
            <select class="form-select form-select-xl" aria-label=".form-select-sm example">
                <option selected>Proyecto</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="input-group mb-3 pt-3">
            <select class="form-select form-select-xl" aria-label=".form-select-sm example">
                <option selected>Titular</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="container">
            <div class="row align-items-start">
                <div class="col">
                    <div class="mb-3">
                        <button type="AgregarD" class="btn btn-primary" style="background-color: #f0ad4e; border-color:black">Agregar docente colaborador</button>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <button type="AgregarA" class="btn btn-primary" style="background-color: #f0ad4e; border-color:black">Agregar alumno colaborador</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <div class="form-floating mb-4">
                <textarea class="form-control" id="txtArea" rows="4"></textarea>
                <label for="floatingTextarea2">Descripcion</label>
            </div>
        </div>
        <!---------------------------------------------------------------------->
        <div class="container">
            <div class="row align-items-start">
                <div class="col">
                    <div class="mb-3">
                        <button type="AgregarD" class="btn btn-primary" style="background-color: #f0ad4e; border-color:black; ">Regresar</button>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <button type="AgregarA" class="btn btn-primary" style="background-color: #f0ad4e; border-color:black; visibility:hidden;">Agregar alumno colaborador</button>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <button type="AgregarA" onclick="v1()" class="btn btn-primary" style="background-color: #f0ad4e; border-color:black ">Siguiente</button>
                    </div>
                </div>
            </div>
        </div>
    </div>                     

