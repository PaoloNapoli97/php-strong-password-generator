<?php
    function get_password($length) {
        $alphabet = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
        $uppercase =[ 'A','B','C','D','E','F','G','H','I','L','M','N','O','P','Q','R','S','T','U','V','Z'];
        $numbers = ['0','1','2','3','4','5','6','7','8','9'];
        $symbols = ['@','#','§','*','/','&','%',"^",'(',')'];

        $full_symbol = array_merge($alphabet, $uppercase, $numbers, $symbols);

        if ( !is_numeric( $length) ) {
            $error = "Hai inserito un valore sbagliato";
        }
        elseif ( $length < 6 ) {
            $error = "La password è troppo corta";
        }
        elseif ( $length > 32 ) {
            $error = "La password è troppo lunga";
        }
        else{
            $password = "";
            for($i = 0; $i <$length; $i++) {
                $random_index = rand(0, count($full_symbol) - 1);
                $password .= $full_symbol[$random_index];
            }
        }

        return [ 
            "password" => $password,
            "error" => $error,
        ];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Strong Password Generator</h1>
        <form action="generator.php" method="GET">
            <div class="my-3">
                <label for="password-length" class="form-label">Lunghezza Password</label>
                <input type="number" class="form-control" id="password-length" name="length" value="<?php echo $_GET['length'] ?>" min="6" max="32" require>
            </div>
            <button type="submit" class="btn btn-primary">Genera Password</button>
        </form>
    </div>
    <!-- Toast Errore Mostrato In Classe -->
    <?php if( $_SESSION['error'] ): ?>
        <div class="toast show align-items-center text-bg-danger position-fixed top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <?php echo $_SESSION['error']; ?>
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>
    <!-- Non FUnzionante -->
</body>
</html>