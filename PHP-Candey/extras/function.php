
<script>
    //Link de las imágenes que llevan al Carrito.
    $(function() {

        //console.log("Ha ocurrido document.ready: documento listo");

        $('#toCarrito1').click(function() {

            if (ingreso == false) {
                <?php $_SESSION['sendMessage'] = '¡Debes ingresar antes de hacer la compra!'; ?>
                location.href = "login.php";
                <?php unset($_SESSION['sendMessage']); ?>

            } else if (ingreso == true && admin == false) {
                location.href = "carrito.php";
            }
            
        });
    });


    let ingreso = "<?php echo (isset($_SESSION['ingreso'])?$_SESSION['ingreso']:''); ?>"
    let admin = "<?php echo (isset($_SESSION['admin'])?$_SESSION['admin']:''); ?>"

    function jsChange() {

        const login = document.querySelector('#login');

        const loginOn = '<li id="login" class="login"><a href="login.php">Ingresar</a></li>';
        const loginOff = '<li id="login" class="login"><a href="index.php?salir=' + "'1'" + '">Salir</a></li>';

        const inventario = '<li class="login"><a href="inventario.php">Inventario</a></li>';
        const carrito = '<li class="login"><a href="carrito.php">Carrito</a></li>';

        const toCarrito = document.querySelector('#toCarrito');

        console.log('ingreso: ', ingreso);
        console.log('admin: ', admin);

        //Si un usuario ingresó cambia el botón 'Ingresar' por el de 'Salir'.
        //Además, si se ingresa como Admin puede acceder al botón 'Inventario', si es usuario normal no.

        if (ingreso == true && admin == true) {
            login.innerHTML = loginOff + inventario;

        } else if (ingreso == true && admin == false) {
            login.innerHTML = loginOff + carrito;

        } else if (ingreso == false) {
            login.innerHTML = loginOn;
        }

    }

    jsChange();
</script>