<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Book Search</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background: linear-gradient(135deg, #4facfe, #00f2fe);
        }
        .search-section {
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            padding: 50px 0;
        }
        .book-card {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .book-card:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        }
        .small-dropdown {
            width: 70px !important;
            min-width: 70px !important;
            text-align: center;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">📚 Book Search</a>
        </div>
    </nav>

    <section class="search-section text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search for a book..." id="cari">
                        <div class="input-group-prepend">
                            <select class="form-select small-dropdown" id="rank">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                        <button class="btn btn-dark" id="search"><i class="fa fa-search"></i> Search</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-4">
        <div class="row" id="content">
            <!-- Search results will appear here -->
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $("#search").click(function(){
            var cari = $("#cari").val();
            var rank = $("#rank").val();
            $.ajax({
                url: '/search?q='+cari+'&rank='+rank,
                dataType: "json",
                success: function(data){
                    $('#content').html(data);
                },
                error: function(){
                    alert("Please enter a search query.");
                }
            });
        });
    });
    </script>
</body>
</html>
