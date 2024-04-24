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

    .remove-btn {
        padding: 1rem;
        padding-top: 1rem;
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
        <form method="POST" action="{{ route('recipes.update', $recipe->id) }}" class="form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <input type="hidden" id="old-tags" name="old_tags" value="{{ json_encode($recipe->tags()->pluck('name')) }}">
            <div class="form-row">
                <label class="form-label" for="name">Name:</label>
                <input class="form-input" type="text" name="name" id="name" value="{{ $recipe->name }}">
            </div>

            <div class="form-row">
                <label class="form-label" for="description">Description:</label>
                <textarea class="form-textarea" name="description" id="description">{{ $recipe->description }}</textarea>
            </div>

            <div class="form-row">
                <label class="form-label" for="prep_time">Prep Time (in minutes):</label>
                <input class="form-input" min="1" type="number" name="prep_time" id="prep_time"
                    value="{{ $recipe->prep_time }}">
            </div>

            <div class="form-row">
                <label class="form-label" for="cook_time">Cook Time (in minutes):</label>
                <input class="form-input" min="1" type="number" name="cook_time" id="cook_time"
                    value="{{ $recipe->cook_time }}">
            </div>

            <div class="form-row">
                <label class="form-label" for="servings">Servings:</label>
                <input class="form-input" min="1" type="number" name="servings" id="servings"
                    value="{{ $recipe->servings }}">
            </div>

            <!-- Ingredients -->
            <div class="form-group" id="ingredients-group">
                <label for="ingredients">Ingredients:</label>
                @foreach ($recipe->ingredients as $index => $ingredient)
                    <div class="input-group">
                        <input type="text" name="ingredients[]" class="form-input mt-1" placeholder="Enter ingredients"
                            value="{{ $ingredient }}">
                        @if ($index > 0)
                            <button style="margin-top: 1rem; margin-bottom: 1rem;" type="button"
                                class="btn btn-danger remove-btn"
                                data-target="ingredient-{{ $index }}">Remove</button>
                        @endif
                    </div>
                @endforeach
            </div>

            <button type="button" id="add-more-ingredients-btn" class="btn btn-primary add-more-btn">Add More
                Ingredients</button>

            <!-- Instructions -->
            <div class="form-group" id="instructions-group">
                <label for="instructions">Instructions:</label>
                @foreach ($recipe->instructions as $index => $instruction)
                    <div class="input-group">
                        <input type="text" name="instructions[]" class="form-input mt-1" placeholder="Enter instructions"
                            value="{{ $instruction }}">
                        @if ($index > 0)
                            <button style="margin-top: 1rem; margin-bottom: 1rem;" type="button"
                                class="btn btn-danger remove-btn"
                                data-target="instruction-{{ $index }}">Remove</button>
                        @endif
                    </div>
                @endforeach
            </div>

            <button type="button" id="add-more-instructions-btn" class="btn btn-primary add-more-btn">Add More
                Instructions</button>

            <!-- Tools -->
            <div class="form-group" id="tools-group">
                <label for="tools">Tools:</label>
                @foreach ($recipe->tools as $index => $tool)
                    <div class="input-group">
                        <input type="text" name="tools[]" class="form-input mt-1" placeholder="Enter tools"
                            value="{{ $tool }}">
                        @if ($index > 0)
                            <button style="margin-top: 1rem; margin-bottom: 1rem;" type="button"
                                class="btn btn-danger remove-btn" data-target="tool-{{ $index }}">Remove</button>
                        @endif
                    </div>
                @endforeach
            </div>

            <button type="button" id="add-more-tools-btn" class="btn btn-primary add-more-btn">Add More Tools</button>

            <section class="recipe-nutrition">
                <h2 style="display: inline;">Nutrition Facts </h2> <span>(per serving)</span>
                <div class="nutritional-facts">
                    <table class="nutritional-facts-table">
                        <tbody class="nutritional-facts-tbody">
                            <tr class="nutritional-facts-summary">
                                <td class="td-bold">
                                    <input class="form-input" type="number" name="calories" id="calories"
                                        value="{{ $recipe->calories }}" placeholder="Calories">
                                </td>
                                <td>Calories</td>
                            </tr>
                            <tr class="nutritional-facts-summary">
                                <td class="td-bold">
                                    <input class="form-input" type="number" name="fat" id="fat"
                                        value="{{ $recipe->fat }}" placeholder="Fat (g)">
                                </td>
                                <td>Fat (g)</td>
                            </tr>
                            <tr class="nutritional-facts-summary">
                                <td class="td-bold">
                                    <input class="form-input" type="number" name="carbs" id="carbs"
                                        value="{{ $recipe->carbs }}" placeholder="Carbs (g)">
                                </td>
                                <td>Carbs (g)</td>
                            </tr>
                            <tr class="nutritional-facts-summary">
                                <td class="td-bold">
                                    <input class="form-input" type="number" name="protein" id="protein"
                                        value="{{ $recipe->protein }}" placeholder="Protein (g)">
                                </td>
                                <td>Protein (g)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <div class="form-row">
                <label class="form-label" for="tags">Tags:</label>
                <select class="form-select custom-select" name="tags[]" id="tags-select" multiple="multiple">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->name }}"
                            {{ collect($recipe->tags)->pluck('name')->contains($tag->name)? 'selected': '' }}>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-row">
                <label class="form-label">Category:</label>
                @foreach ($categories as $category)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category_id"
                            id="category{{ $category->id }}" value="{{ $category->id }}"
                            {{ $category->id == $selectedCategoryId ? 'checked' : '' }}>
                        <label class="form-check-label" for="category{{ $category->id }}">
                            {{ $category->name }}
                        </label>
                    </div>
                @endforeach
            </div>


            <div class="form-row">
                <label class="form-label" for="image">Image:</label>
                <input class="form-input" type="file" name="image" id="image">
            </div>

            <button type="submit" class="btn btn-block">Update</button>
        </form>
    </main>
    <script>
        $(document).ready(function() {
            $('#tags-select').select2({
                placeholder: 'Select tags',
                allowClear: true,
                tags: true,
            });

            var existingTags = {!! json_encode($recipe->tags()->pluck('name')) !!}; // Assuming $recipe->tags() returns a collection
            $('#tags-select').val(existingTags);
            $('#tags-select').trigger('change');

            // Handle changes to the tags-select element
            $('#tags-select').on('change', function() {
                // Get the selected tags
                var selectedTags = $(this).val();

                // Get the old tags from the hidden input
                var oldTags = JSON.parse($('#old-tags').val());

                // Merge old and new tags (remove duplicates)
                var allTags = [...new Set([...selectedTags, ...oldTags])];

                // Update the hidden old-tags input with the merged data
                $('#old-tags').val(JSON.stringify(allTags));
            });

            var ingredientCounter = 1;
            var instructionCounter = 1;
            var toolCounter = 1;

            $("#add-more-ingredients-btn").click(function() {
                var uniqueId = "ingredient-" + ingredientCounter;
                ingredientCounter++;
                var clonedIngredientInput = $(
                    '<div class="form-group" id="' + uniqueId +
                    '"><input type="text" name="ingredients[]" class="form-input mt-1" placeholder="Enter ingredients"> <button type="button" class="btn btn-danger remove-btn" data-target="' +
                    uniqueId + '">Remove</button></div>'
                );
                $("#ingredients-group").append(clonedIngredientInput);
            });

            $("#add-more-instructions-btn").click(function() {
                var uniqueId = "instruction-" + instructionCounter;
                instructionCounter++;
                var clonedInstructionInput = $(
                    '<div class="form-group" id="' + uniqueId +
                    '"><input type="text" name="instructions[]" class="form-input mt-1" placeholder="Enter instructions"> <button type="button" class="btn btn-danger remove-btn" data-target="' +
                    uniqueId + '">Remove</button></div>'
                );
                $("#instructions-group").append(clonedInstructionInput);
            });

            $("#add-more-tools-btn").click(function() {
                var uniqueId = "tool-" + toolCounter;
                toolCounter++;
                var clonedToolInput = $(
                    '<div class="form-group" id="' + uniqueId +
                    '"><input type="text" name="tools[]" class="form-input mt-1" placeholder="Enter tools"> <button type="button" class="btn btn-danger remove-btn" data-target="' +
                    uniqueId + '">Remove</button></div>'
                );
                $("#tools-group").append(clonedToolInput);
            });

            // Add event handler to remove button
            $(document).on('click', '.remove-btn', function() {
                $(this).closest('.input-group').remove();
            });
        });
    </script>
@endsection
