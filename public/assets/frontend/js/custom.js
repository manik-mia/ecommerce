'use strict';

$('.select2').select2({
    minimumResultsForSearch: Infinity
});

// Select2 by showing the search
$('.select2-show-search').select2({
    minimumResultsForSearch: ''
});

// Select2 with tagging support
$('.select2-tag').select2({
    tags: true,
    tokenSeparators: [',', ' ']
});