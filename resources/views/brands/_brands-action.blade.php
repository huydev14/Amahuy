<div class="tw-flex tw-items-center tw-justify-center tw-gap-2">
    <button id="edit-brand-btn" type="button" title="Sửa thông tin" class="user-action-btn tw-text-gray-500 "
        data-edit-url="{{ route('brands.edit', $brand->id) }}">
        <x-icon-edit />
    </button>

    <button id="delete-brand-btn" type="button" title="Xóa thương hiệu" class="user-action-btn tw-text-red-800"
        data-delete-url="{{ route('brands.destroy', $brand->id) }}"
        data-restore-url="{{ route('brands.restore', $brand->id) }}">
        <x-icon-delete />
    </button>
</div>
