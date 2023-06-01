
class validacionesJs{
  
        capturar_campos() {
          
            const array_campos = [];
            const array_checkbox = [];
      
            var nombre = document.getElementById('id_nombre').value;
            array_campos.push(nombre);
            var alias = document.getElementById('id_alias').value;
            array_campos.push(alias);
            var rut = document.getElementById('id_rut').value;
            array_campos.push(rut);
            var email = document.getElementById('id_email').value;
            array_campos.push(email);
            var region = document.getElementById('id_region').value;
            array_campos.push(region);
            var comuna = document.getElementById('id_comuna').value;
            array_campos.push(comuna);
            var candidato = document.getElementById('id_candidato').value;
            array_campos.push(candidato);

            // Obtener los valores de los checkboxes en array_checkbox
            if(id_web.checked == true){
                array_checkbox.push('Web')
            }
            if(id_tv.checked == true){
                array_checkbox.push('TV')
            }
            if(id_redSocial.checked == true){
                array_checkbox.push('Redes Sociales')
            }
            if(id_amigo.checked == true){
                array_checkbox.push('Amigo')
            }
            
            array_campos.push(array_checkbox);
            console.log(array_campos);
      
            return array_campos;
            
        }
      
        validar_campos_vacios() {
            var arreglo = this.capturar_campos();
            console.log(arreglo);
            const valor_vacio = arreglo.some(elemento => elemento === '');
            if (valor_vacio) {
                console.log('El formulario contiene al menos un valor vacío.');
                document.getElementById('msje_alerta').innerHTML="El formulario contiene al menos un valor vacío."
            } else {
                console.log('El formulario NO contiene valores vacíos.');
                this.validar_checkbox();
            }
        }

        validar_checkbox(){
            var arreglo = this.capturar_campos();
            if(arreglo[7].length == 1 || arreglo[7].length == 2){
                console.log('correcto redes sociales');
                console.log(arreglo);
                this.validar_nombre();

            }else{
                console.log('Ingresar mínimo 1 y máximo 2 redes sociales');
                document.getElementById('msje_alerta').innerHTML="Ingresar mínimo 1 y máximo 2 redes sociales"
            }
        }

        validar_nombre(){
            var arreglo = this.capturar_campos();
            var nombre = arreglo[0]
            var nombre_apellido = nombre.search(/^([a-zA_Z]+)(\s{1})([a-zA_Z]+)$/)
            console.log(nombre_apellido);
            console.log(nombre.length);
            if(nombre_apellido == 0 && nombre.length < 30){
               console.log('nombre y apellido correcto');
               console.log(arreglo);
               this.validar_alias()
            }else{
                console.log('Debe ingresar nombre y apellido con 1 espacio y maximo 30 caracteres');
                document.getElementById('msje_alerta').innerHTML="Debe ingresar nombre y apellido con 1 espacio y maximo 30 caracteres"
            }

        }

        validar_alias(){
            var arreglo = this.capturar_campos();
            var alias = arreglo[1]
            var mi_alias = alias.search(/^[a-zA-Z0-9]{1,10}$/)
            console.log(mi_alias);
            if(mi_alias == 0){
               console.log('alias correcto');
               console.log(arreglo);
               this.validar_rut();
            }else{
                console.log('Alias debe ser alfanumerico y maximo 10 caracteres');
                document.getElementById('msje_alerta').innerHTML="Alias debe ser alfanumerico y maximo 10 caracteres"
            }

        }

        validar_rut(){
            var arreglo = this.capturar_campos();
            var rut = arreglo[2]
            const exp_reg = /^\d{7,8}-[\dkK]$/;
            if (exp_reg.test(rut)) {
              console.log('RUT correcto');
              this.validar_email()
            } else {
              console.log('El RUT debe tener el formato 11111111-1 sin puntos y con guión');
              document.getElementById('msje_alerta').innerHTML='El RUT debe tener el formato 11111111-1 sin puntos y con guión'
            }
            
        }

        validar_email(){
            var arreglo = this.capturar_campos();
            var email = arreglo[3]
            const exp_reg = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (exp_reg.test(email) == true && email.length < 30) {
              console.log('Email correcto');
              this.validacion_final()
            } else {
              console.log('El Email debe tener el formato abc123@abc.com y debe contener maximo 30 caracteres');
              document.getElementById('msje_alerta').innerHTML='Email debe tener el formato abc123@abc.com y debe contener maximo 30 caracteres'
            }
        }

        validacion_final(){
            var arreglo = this.capturar_campos();
            console.log('Valiodacion exitoza. El arrglo quedo asi: ');
            document.getElementById('msje_alerta').innerHTML='Formulario enviado y validado correctamente'
            document.getElementById("frm").reset();
            console.log(arreglo);
        }


}

document.getElementById('btn').addEventListener('click', function(event) {
    event.preventDefault();
    var objMiValidacion = new validacionesJs();
    objMiValidacion.validar_campos_vacios();
    
})
      

