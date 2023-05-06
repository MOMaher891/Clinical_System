<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('Front/Style/book/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />

</head>

<body>
    <div class="contanair">
        <div class="title"> Patient Reservation</div>
        <form method="POST" action="{{ route('book') }}">
            @csrf
            <input type="hidden" value="{{ $department->id }}" name="department_id">
            <div class="user">
                <div class="input-box">
                    <span class="details">Name</span>
                    <input type="text" class="form-control" name="pat_name" placeholder="Enter your name" required>
                </div>
                <div class="input-box">
                    <span class="details">National ID</span>
                    <input type="id" class="form-control" name="pat_nat_id" placeholder="Enter your ID" required>
                </div>
                <div class="input-box">
                    <span class="details">Gender</span>
                    <select name="pat_gender" class="form-control">
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                    </select>
                </div>
                <div class="input-box">
                    <span class="details">Birth Date</span>
                    <input type="date" name="pat_age" class="form-control" placeholder="Enter your Birth-date"
                        required>
                </div>

            </div>
            <div>
                <input type="submit" value="Book" class="btn btn-success">
            </div>
        </form>
    </div>

</body>

</html>
