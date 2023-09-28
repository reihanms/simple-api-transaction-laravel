<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Transaction API</title>
</head>
<body>
    <div>
        <?php
        use Illuminate\Support\Facades\DB;

            if(DB::connection()->getPdo()){
                echo "Succes Connect to DB ".DB::connection()->getDataBaseName();
            }
        ?>
    </div>

</body>
</html>
