<?php
    $arrUsersList = array(
        'Admin' => array(
            'gewbarbie' => '1234',
            
        ),
    
        'Content Manager' => array(
            'darna' => 'pass12345',
            'mark' => 'santos',
            'han dao' => 'pogisomuch'
        ),
    
        'System User' => array(
            'matang' => 'lawin',
            'labubu' => 'popmart'
        )
    );
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/custom-login.css">
    <title>Login</title>
</head>
<body>
    <div class="container mt-5">
        <?php if (isset($_REQUEST['btnSignIn'])): ?> 
            <?php
                $userType = $_REQUEST['inputUserType'];
                $userUsername = $_REQUEST['inputUserName'];
                $userPassword = $_REQUEST['inputPassword'];

                if (array_key_exists($userUsername, $arrUsersList[$userType]) && ($arrUsersList[$userType][$userUsername] == $userPassword)):
            ?>
                <div class="alert alert-success alert-dismissible fade show" style="max-width: 350px; margin: auto;">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    Welcome to the system: <?php echo htmlspecialchars($userUsername); ?>.
                </div>
            <?php else: ?>
                <div class="alert alert-danger alert-dismissible fade show" style="max-width: 350px; margin: auto;">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    Incorrect Username / Password.
                </div>
            <?php endif; ?>
        <?php endif; ?>
        
        <div class="card mx-auto" style="max-width: 400px;">
            <div class="card-body text-center">
                <img id="profile-img" class="profile-img-card mb-3" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Profile Image" />
                <h4 class="card-title">Login</h4>
                <form method="post" class="form-signin">
                    <div class="mb-3">
                        <select class="form-select" name="inputUserType" id="inputUserType" required>
                            <option value="" disabled selected>Select User Type</option>
                            <option value="Admin">Admin</option>
                            <option value="Content Manager">Content Manager</option>  
                            <option value="System User">System User</option>   
                        </select>
                    </div>>
                    <div class="mb-3">
                        <input type="text" name="inputUserName" id="inputUserName" class="form-control" placeholder="User Name" required autofocus>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" name='btnSignIn'>Sign in</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
