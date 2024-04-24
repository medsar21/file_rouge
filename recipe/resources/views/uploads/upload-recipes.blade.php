@extends('layouts.home.master')
<style>
    .form {
        width: 90vw;
        max-width: var(--fixed-width);
        background: var(--white);
        border-radius: var(--borderRadius);
        box-shadow: var(--shadow-2);
        padding: 2rem 2.5rem;
        margin: 3rem auto;
    }

    .form-label {
        display: block;
        font-size: var(--smallText);
        margin-bottom: 0.5rem;
        text-transform: capitalize;
        letter-spacing: var(--letterSpacing);
    }

    .form-input,
    .form-textarea {
        width: 100%;
        padding: 0.375rem 0.75rem;
        border-radius: var(--borderRadius);
        background: var(--backgroundColor);
        border: 1px solid var(--grey-200);
    }

    .form-row {
        margin-bottom: 1rem;
    }

    .form-textarea {
        height: 7rem;
    }

    ::placeholder {
        font-family: inherit;
        color: var(--grey-400);
    }

    .form-alert {
        color: var(--red-dark);
        letter-spacing: var(--letterSpacing);
        text-transform: capitalize;
    }

    .custom-select {
        width: 100%;
        padding: 1rem;
    }

    /* Style the Select2 dropdown */
    .select2-container {
        width: 100%;
    }

    .select2-selection {
        border: 1px solid var(--grey-200);
        /* Adjust border color */
        border-radius: var(--borderRadius);
        background-color: var(--backgroundColor);
        min-height: 38px;
        /* Adjust the minimum height */
        padding: 6px 12px;
        /* Adjust padding */
    }

    .select2-container,
    .select2-selection {
        overflow-x: hidden !important;
    }

    /* Style the selected tags */
    .select2-selection__choice {
        background-color: var(--primary);
        /* Change the background color of selected tags */
        color: white;
        /* Change text color of selected tags */
        border: 1px solid var(--primary);
        /* Add a border to selected tags */
        border-radius: 4px;
        /* Add border radius */
        padding: 2px 5px;
        /* Adjust padding */
        margin-right: 5px;
        /* Adjust margin between selected tags */
    }

    /* Style the placeholder text */
    .select2-selection__placeholder {
        color: var(--grey-400);
        /* Adjust placeholder text color */
    }

    /* Style the search input */
    .select2-search__field {
        border: 1px solid var(--grey-200);
        /* Adjust border color */
        border-radius: var(--borderRadius);
        background-color: var(--backgroundColor);
        padding: 6px 12px;
        /* Adjust padding */
    }

    /* Style the dropdown arrow */
    .select2-selection__arrow {
        top: 50%;
        /* Adjust arrow position vertically */
        transform: translateY(-50%);
    }

    /* Style the dropdown list */
    .select2-dropdown {
        border: 1px solid var(--grey-200);
        /* Adjust border color */
        border-radius: var(--borderRadius);
        background-color: var(--backgroundColor);
        box-shadow: var(--shadow-2);
        /* Add box shadow */
    }

    /* Style the options in the dropdown */
    .select2-results__option {
        padding: 8px 12px;
        /* Adjust padding */
        color: var(--black);
        /* Adjust text color */
        background-color: var(--white);
        /* Adjust background color */
        border-bottom: 1px solid var(--grey-200);
        /* Add a bottom border to separate options */
    }

    /* Style the highlighted option on hover */
    .select2-results__option--highlighted {
        background-color: var(--primary);
        /* Change background color on hover */
        color: white;
        /* Change text color on hover */
    }

    /* Style the "X" button to remove tags */
    .select2-selection__choice__remove {
        color: white;
        /* Change the "X" button color */
        margin-right: 5px;
        /* Adjust margin between the "X" button and the tag */
        cursor: pointer;
        /* Add a pointer cursor for removal */
    }

    /* Style the Select2 dropdown */
    .select2-container {
        width: 100%;
    }

    .select2-selection {
        border: 1px solid var(--grey-200);
        /* Adjust border color */
        border-radius: var(--borderRadius);
        background-color: var(--backgroundColor);
        min-height: 38px;
        /* Adjust the minimum height */
        padding: 6px 12px;
        /* Adjust padding */
    }

    /* Style the selected tags */
    .select2-selection__choice {
        background-color: var(--primary);
        /* Change the background color of selected tags */
        color: white;
        /* Change text color of selected tags */
        border: 1px solid var(--primary);
        /* Add a border to selected tags */
        border-radius: 4px;
        /* Add border radius */
        padding: 2px 5px;
        /* Adjust padding */
        margin-right: 5px;
        /* Adjust margin between selected tags */
    }

    /* Style the placeholder text */
    .select2-selection__placeholder {
        color: var(--grey-400);
        /* Adjust placeholder text color */
    }

    /* Style the search input */
    .select2-search__field {
        border: 1px solid var(--grey-200);
        /* Adjust border color */
        border-radius: var(--borderRadius);
        background-color: var(--backgroundColor);
        padding: 6px 12px;
        /* Adjust padding */
    }

    /* Style the dropdown arrow */
    .select2-selection__arrow {
        top: 50%;
        /* Adjust arrow position vertically */
        transform: translateY(-50%);
    }

    /* Style the dropdown list */
    .select2-dropdown {
        border: 1px solid var(--grey-200);
        /* Adjust border color */
        border-radius: var(--borderRadius);
        background-color: var(--backgroundColor);
        box-shadow: var(--shadow-2);
        /* Add box shadow */
    }

    /* Style the options in the dropdown */
    .select2-results__option {
        padding: 8px 12px;
        /* Adjust padding */
        color: var(--black);
        /* Adjust text color */
        background-color: var(--white);
        /* Adjust background color */
        border-bottom: 1px solid var(--grey-200);
        /* Add a bottom border to separate options */
    }

    /* Style the highlighted option on hover */
    .select2-results__option--highlighted {
        background-color: var(--primary);
        /* Change background color on hover */
        color: white;
        /* Change text color on hover */
    }

    /* Style the "X" button to remove tags */
    .select2-selection__choice__remove {
        color: white;
        /* Change the "X" button color */
        margin-right: 5px;
        /* Adjust margin between the "X" button and the tag */
        cursor: pointer;
        /* Add a pointer cursor for removal */
    }
</style>
@section('content')
    <main class="page">
        <form method="POST" action="{{ route('recipes.store') }}" class="form" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-row">
                <label class="form-label" for="name">Name:</label>
                <input required class="form-input" type="text" name="name" id="name">
            </div>

            <div class="form-row">
                <label class="form-label" for="description">Description:</label>
                <textarea required class="form-textarea" name="description" id="description"></textarea>
            </div>

            <div class="form-row">
                <label class="form-label" for="prep_time">Prep Time (in minutes):</label>
                <input required class="form-input" min="1" type="number" name="prep_time" id="prep_time">
            </div>

            <div class="form-row">
                <label class="form-label" for="cook_time">Cook Time (in minutes):</label>
                <input required class="form-input" min="1" type="number" name="cook_time" id="cook_time">
            </div>

            <div class="form-row">
                <label class="form-label" for="servings">Servings:</label>
                <input required class="form-input" min="1" type="number" name="servings" id="servings">
            </div>

            <div class="form-row">
                <label class="form-label" for="video_url">Video URL: (Not required)</label>
                <input class="form-input" type="text" name="video_url" id="video_url">
            </div>

            <!-- Ingredients -->
            <div class="form-group" id="ingredients-group">
                <label for="ingredients">Ingredients:</label>
                <div class="input-group">
                    <input required type="text" name="ingredients[]" class="form-input mt-1"
                        placeholder="Enter ingredients">
                    <button type="button" style="margin-top: 1rem; margin-bottom: 1rem;" type="button"
                        class="btn btn-danger remove-btn">Remove</button>
                </div>
            </div>

            <button type="button" id="add-more-ingredients-btn" class="btn btn-primary add-more-btn">Add More
                Ingredients</button>

            <!-- Instructions -->
            <div class="form-group" id="instructions-group">
                <label for="instructions">Instructions:</label>
                <div class="input-group">
                    <input required type="text" name="instructions[]" class="form-input mt-1"
                        placeholder="Enter instructions">
                    <button type="button" style="margin-top: 1rem; margin-bottom: 1rem;" type="button"
                        class="btn btn-danger remove-btn">Remove</button>
                </div>
            </div>

            <button type="button" id="add-more-instructions-btn" class="btn btn-primary add-more-btn">Add More
                Instructions</button>

            <!-- Tools -->
            <div class="form-group" id="tools-group">
                <label for="tools">Tools:</label>
                <div class="input-group">
                    <input required type="text" name="tools[]" class="form-input mt-1" placeholder="Enter tools">
                    <button type="button" style="margin-top: 1rem; margin-bottom: 1rem;" type="button"
                        class="btn btn-danger remove-btn">Remove</button>
                </div>
            </div>

            <button type="button" id="add-more-tools-btn" class="btn btn-primary add-more-btn">Add More Tools</button>
            <!-- Nutritional Facts Table -->
            <table class="nutritional-facts-table">
                <tbody class="nutritional-facts-tbody">
                    <th style="text-align: left;">
                        Nutritonal Facts (Can be left empty, only type in the numbers!)
                    </th>
                    <tr class="nutritional-facts-summary">
                        <td class="td-bold">Calories</td>
                        <td><input class="form-input" type="number" name="calories" id="calories"
                                placeholder="Calories">
                        </td>
                    </tr>
                    <tr class="nutritional-facts-summary">
                        <td class="td-bold">Fat</td>
                        <td><input class="form-input" type="number" name="fat" id="fat"
                                placeholder="Fat (g)"></td>
                    </tr>
                    <tr class="nutritional-facts-summary">
                        <td class="td-bold">Carbs</td>
                        <td><input class="form-input" type="number" name="carbs" id="carbs"
                                placeholder="Carbs (g)"></td>
                    </tr>
                    <tr class="nutritional-facts-summary">
                        <td class="td-bold">Protein</td>
                        <td><input class="form-input" type="number" name="protein" id="protein"
                                placeholder="Protein (g)"></td>
                    </tr>
                </tbody>
            </table>

            <div class="form-row">
                <label class="form-label" for="tags">Tags:</label>
                <select required class="form-select custom-select" name="tags[]" id="tags-select" multiple="multiple">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-row">
                <label class="form-label">Category:</label>
                @foreach ($categories as $category)
                    <div class="form-check">
                        <input required class="form-check-input" type="radio" name="category_id"
                            id="category{{ $category->id }}" value="{{ $category->id }}">
                        <label class="form-check-label" for="category{{ $category->id }}">
                            {{ $category->name }}
                        </label>
                    </div>
                @endforeach
            </div>


            <div class="form-row">
                <label class="form-label" for="image">Image:</label>
                <input required class="form-input" type="file" name="image" id="image">
            </div>

            <button type="submit" class="btn btn-block">Submit</button>
        </form>
    </main>
    <script>
        $(document).ready(function() {
            $('#tags-select').select2({
                placeholder: 'Select tags',
                allowClear: true,
                tags: true,
            });

            var ingredientCounter = 1;
            var instructionCounter = 1;
            var toolCounter = 1;

            // Function to create a new input group with a "Remove" button
            function createInputGroup(inputName, inputPlaceholder) {
                var inputGroup = $(
                    '<div class="input-group">' +
                    '<input required type="text" name="' + inputName +
                    '[]" class="form-input mt-1" placeholder="' +
                    inputPlaceholder + '">' +
                    '<button type="button" style="margin-top: 1rem; margin-bottom: 1rem;" class="btn btn-danger remove-btn">Remove</button>' +
                    '</div>'
                );
                return inputGroup;
            }

            $("#add-more-ingredients-btn").click(function() {
                var uniqueId = "ingredient-" + ingredientCounter;
                ingredientCounter++;
                var clonedIngredientInput = createInputGroup("ingredients", "Enter ingredients");
                $("#ingredients-group").append(clonedIngredientInput);
            });

            $("#add-more-instructions-btn").click(function() {
                var uniqueId = "instruction-" + instructionCounter;
                instructionCounter++;
                var clonedInstructionInput = createInputGroup("instructions", "Enter instructions");
                $("#instructions-group").append(clonedInstructionInput);
            });

            $("#add-more-tools-btn").click(function() {
                var uniqueId = "tool-" + toolCounter;
                toolCounter++;
                var clonedToolInput = createInputGroup("tools", "Enter tools");
                $("#tools-group").append(clonedToolInput);
            });

            // Event delegation for removing input groups
            $(document).on('click', '.remove-btn', function() {
                $(this).closest('.input-group').remove();
            });
        });
    </script>
@endsection
