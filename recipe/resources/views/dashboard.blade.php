<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* Dashboard styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .dashboard-header {
            background-color: #4a5568;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .dashboard-links {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        .dashboard-link {
            display: block;
            padding: 10px 20px;
            font-size: 16px;
            color: #4a5568;
            transition: background-color 0.3s;
            border-radius: 4px;
            margin-bottom: 10px;
            text-decoration: none;
        }

        .dashboard-link:hover {
            background-color: #edf2f7;
            color: #2d3748;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="dashboard-header">
            <h2>Dashboard</h2>
        </div>

        <div class="dashboard-links">
            <a href="{{ route('starter.index') }}" class="dashboard-link">Home</a>
            <a href="{{ route('recipes.user.index') }}" class="dashboard-link">My Recipes</a>
            <a href="{{ route('recipes.index') }}" class="dashboard-link">Upload Recipe</a>
            <a href="{{ route('recipes.favorites.index') }}" class="dashboard-link">Favorite Recipes</a>
            <a href="{{ route('profile.edit') }}" class="dashboard-link">Edit Profile</a>
            <a href="{{ route('profile.collections') }}" class="dashboard-link">My Collections</a>
            <a href="{{ route('collections.create') }}" class="dashboard-link">Create a New Collection</a>
            <a href="{{ route('mealplan.showMealPlans') }}" class="dashboard-link">My Meal Plans</a>
            <!-- <a href="{{ route('mealplan.show') }}" class="dashboard-link">Create a New Meal Plan</a> -->
        </div>
    </div>


</body>

</html>
