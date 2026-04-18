<?php

return [
    'filter' => [
        'title' => 'Filter',
        'product' => 'Product',
        'status' => 'Status',
        'placeholder' => 'Choose an option',
    ],

    'table' => [
        'product' => 'Product',
        'sku' => 'SKU',
        'barcode' => 'Barcode',
        'price' => 'Price',
        'compare_at_price' => 'Compare at price',
        'cost_price' => 'Cost price',
        'position' => 'Position',
        'status' => 'Status',
        'updated_at' => 'Updated at',
        'action' => 'Action',
    ],

    'status' => [
        'active' => 'Active',
        'inactive' => 'Inactive',
        'hidden' => 'Hidden',
    ],

    'action' => [
        'edit' => 'Edit',
        'delete' => 'Delete variant',
    ],

    'modal' => [
        'create_title' => 'Create product variant',
        'create_subtitle' => 'Please fill in the basic information below.',
        'edit_title' => 'Update product variant',
        'edit_subtitle' => 'Edit variant information and save your changes.',
        'save_create' => 'Save variant',
        'save_edit' => 'Save changes',
    ],

    'form' => [
        'product' => 'Product',
        'product_placeholder' => 'Select product',
        'sku' => 'SKU',
        'sku_placeholder' => 'Eg: IP16PM-BLK-256',
        'barcode' => 'Barcode',
        'barcode_placeholder' => 'Enter barcode',
        'price' => 'Price',
        'compare_at_price' => 'Compare at price',
        'cost_price' => 'Cost price',
        'position' => 'Display position',
        'attributes' => 'Attributes (JSON)',
        'attributes_placeholder' => '{"color":"black","storage":"256GB"}',
        'active_label' => 'Active status',
        'active_hint' => 'Allow this variant to be shown in the system',
    ],

    'validation' => [
        'product_required' => 'Please select a product.',
        'sku_required' => 'Please enter SKU.',
        'sku_unique' => 'This SKU already exists in the system.',
        'barcode_unique' => 'This barcode already exists in the system.',
        'price_required' => 'Please enter price.',
        'attributes_json' => 'Attributes must be valid JSON format.',
    ],

    'messages' => [
        'create_success' => 'Variant created successfully!',
        'update_success' => 'Variant updated successfully!',
        'delete_success' => 'Variant deleted.',
        'restore_success' => 'Variant restored successfully.',
        'restore_error' => 'System error, unable to restore variant.',
        'system_error' => 'System error',
    ],

    'js' => [
        'confirm_delete' => 'Confirm deleting this variant?',
        'undo' => 'Undo',
        'save_loading' => 'Saving...',
        'code_prefix' => 'Error code:',

        'toast' => [
            'success_title' => 'Success',
            'delete_title' => 'Variant deleted',
            'delete_description' => 'The variant has been moved to trash.',
            'undo_success_title' => 'Undo successful',
            'undo_success_description' => 'The variant has been restored.',
            'restore_error_title' => 'Restore failed',
            'restore_error_description' => 'Unable to undo this action.',
            'generic_error_title' => 'Something went wrong!',
            'generic_error_description' => 'Please try again later',
            'process_failed_title' => 'Process failed',
            'process_failed_description' => 'Invalid data. Please check your inputs.',
            'system_error_title' => 'System error',
            'system_error_description' => 'A system error has occurred!',
        ],
    ],
];

