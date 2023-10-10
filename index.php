<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account Details</title>
  <link rel="shortcut icon" type="image/png" href="img/bank.png" />
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    body {
      background-color: #f8f9fa; /* Set your desired background color */
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .form-container {
      width: 350px;
      padding: 20px;
      border-radius: 10px;
      background-color: #ffffff; /* Set your desired form background color */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-heading {
      text-align: center;
      margin-bottom: 20px;
      color: #007bff; /* Set your desired heading color */
    }

    .form-container .form-control {
      border-radius: 5px;
    }

    .form-container .btn-primary {
      background-color: #007bff; /* Set your desired button background color */
      border: none;
      width: 100%;
      margin-top: 20px;
    }

    .form-container .btn-primary:hover {
      background-color: #0056b3; /* Set your desired button hover color */
    }

    .form-container .btn-reset {
      background-color: #6c757d; /* Set your desired reset button background color */
      border: none;
      width: 100%;
      margin-top: 10px;
    }

    .form-container .btn-reset:hover {
      background-color: #444d56; /* Set your desired reset button hover color */
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-4">
        <div class="form-container">
          <div style="text-align: center;">
            <span style="display: inline-block; vertical-align: middle;">
              <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-bank" viewBox="0 0 16 16"    style="vertical-align: middle;">
                <path d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.501.501 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89L8 0ZM3.777 3h8.447L8 1 3.777 3ZM2 6v7h1V6H2Zm2 0v7h2.5V6H4Zm3.5 0v7h1V6h-1Zm2 0v7H12V6H9.5ZM13 6v7h1V6h-1Zm2-1V4H1v1h14Zm-.39 9H1.39l-.25 1h13.72l-.25-1Z"/>
              </svg>
              <h2 class="form-heading" style="vertical-align: middle;">Bank Corporate</h2>
            </span>
          </div>
          <form method="post" action="checkaccount.php">
            <div class="mb-3">
              <input type="text" class="form-control" name="account_number" id="account_number" placeholder="Enter Account Number" required pattern="\d+" title="Please enter only digits">
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" name="reenter_account_number" id="reenter_account_number" placeholder="Re-Enter Account Number" required pattern="\d+" title="Please enter only digits">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-reset">Reset</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap 5 JS (Optional if you don't require any Bootstrap JS components) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
