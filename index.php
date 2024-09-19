<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Registration Form</h2>
        <form action="submit.php" method="POST">
            <div class="form-group">
                
                <input type="text" id="name" name="name" placeholder="Enter your name" required 
                       value="<?php echo htmlspecialchars($_GET['name'] ?? ''); ?>">
                <?php if (isset($_GET['nameError'])): ?>
                    <div class="error"><?php echo $_GET['nameError']; ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                
                <input type="text" id="surname" name="surname" placeholder="Enter your surname" required 
                       value="<?php echo htmlspecialchars($_GET['surname'] ?? ''); ?>">
                <?php if (isset($_GET['surnameError'])): ?>
                    <div class="error"><?php echo $_GET['surnameError']; ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                
                <input type="text" id="idNumber" name="idNumber" placeholder="Enter your idNumber" required 
                       value="<?php echo htmlspecialchars($_GET['idNumber'] ?? ''); ?>">
                <?php if (isset($_GET['idNumberError'])): ?>
                    <div class="error"><?php echo $_GET['idNumberError']; ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                
                <input type="text" id="dob" name="dob" placeholder="Enter date of birth (dd/mm/YYYY)" required 
                       value="<?php echo htmlspecialchars($_GET['dob'] ?? ''); ?>">
                <?php if (isset($_GET['dobError'])): ?>
                    <div class="error"><?php echo $_GET['dobError']; ?></div>
                <?php endif; ?>
            </div>

            <div class="button-group">
                <input type="submit" value="Submit">
                <input type="reset" value="Clear" onclick="clearForm(this.form)">
            </div>
        </form>
    </div>
</body>
</html>