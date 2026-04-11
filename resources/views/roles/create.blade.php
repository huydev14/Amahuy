@extends('layouts.main')

@section('content')
    <div class="tw-min-h-screen tw-bg-gray-50/50 tw-py-8">
        <div class="tw-max-w-5xl tw-mx-auto tw-px-4 sm:tw-px-6 lg:tw-px-8">

            <form action="{{ route('roles.store') }}" method="POST" id="role-form" novalidate>
                @csrf

                <div class="tw-space-y-6">
                    <div class="tw-bg-white tw-rounded-xl tw-border tw-border-gray-200 tw-shadow-md tw-overflow-hidden">
                        <div class="tw-px-6 tw-py-4 tw-border-b tw-border-gray-100 tw-bg-gray-50/50">
                            <h4 class="tw-text-base tw-font-semibold tw-text-gray-900 tw-flex tw-items-center tw-gap-2">
                                Thông tin vai trò
                            </h4>
                        </div>
                        <div class="tw-p-4">
                            <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 tw-gap-6">
                                <div>
                                    <label for="name"
                                        class="tw-block tw-text-sm tw-font-medium tw-text-gray-700 tw-mb-1.5">Tên vai trò
                                        <span class="tw-text-red-500">*</span></label>
                                    <input type="text" name="name" id="name"
                                        placeholder="VD: Quản trị viên, Nhân sự..." required
                                        class="tw-w-full tw-rounded-md tw-border-gray-300 tw-shadow-sm focus:tw-border-blue-500 focus:tw-ring-blue-500 tw-text-sm tw-py-2 tw-px-3 tw-transition-colors">
                                </div>

                                <div>
                                    <label for="guard_name"
                                        class="tw-block tw-text-sm tw-font-medium tw-text-gray-700 tw-mb-1.5">Description</label>
                                    <input type="text" name="description" id="description"
                                        placeholder="Nhập mô tả cho vai trò..."
                                        class="tw-w-full tw-rounded-md tw-border-gray-300 tw-shadow-sm tw-text-sm tw-py-2 tw-px-3 focus:tw-outline-none">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tw-bg-white tw-rounded-xl tw-border tw-border-gray-200 tw-shadow-md tw-overflow-hidden">
                        <div
                            class="tw-px-6 tw-py-4 tw-border-b tw-border-gray-200 tw-bg-gray-50/50 tw-flex tw-justify-between tw-items-center">
                            <h4 class="tw-text-medium tw-font-semibold tw-text-gray-800">
                                Danh sách Quyền hạn (Permissions)
                            </h4>
                            <button type="button" id="btn-check-all-global"
                                class="tw-text-sm tw-font-medium tw-text-[#0078D4] hover:tw-text-[#106ebe] tw-transition-colors">
                                Chọn tất cả
                            </button>
                        </div>

                        <div class="tw-p-0 tw-flex tw-flex-col">

                            {{-- ----- USERS --------- --}}
                            <div class="permission-group tw-bg-white">
                                <div
                                    class="accordion-header tw-flex tw-items-center tw-justify-between tw-px-6 tw-py-3 tw-border-b tw-border-gray-100 hover:tw-bg-gray-50 tw-cursor-pointer tw-transition-colors">
                                    <div class="tw-flex tw-items-center tw-gap-4">
                                        <div class="tw-w-5 tw-flex tw-justify-center tw-shrink-0">
                                            <i
                                                class="fas fa-chevron-right tw-text-gray-500 tw-text-sm tw-transition-transform tw-duration-200 accordion-icon"></i>
                                        </div>
                                        <div>
                                            <span class="tw-font-bold tw-text-gray-900 tw-text-sm tw-block">
                                                Quản lý tài khoản
                                            </span>
                                            <span class="tw-text-xs tw-text-gray-500 tw-font-normal tw-mt-0.5 tw-block">
                                                Xem, thêm, sửa, xóa và khóa tài khoản
                                            </span>
                                        </div>
                                    </div>

                                    <div onclick="event.stopPropagation()">
                                        <x-checkbox name="check_all" label="Chọn tất cả"
                                            class="tw-px-3 tw-py-1 tw-bg-white tw-border tw-border-gray-200 tw-rounded tw-shadow-sm hover:tw-bg-gray-50 tw-transition-colors" />
                                    </div>
                                </div>

                                <div class="accordion-body tw-hidden tw-flex tw-flex-col">
                                    <div>
                                        <x-checkbox label="Xem người dùng" name="permissions[]" value="users.view"
                                            class="tw-flex tw-items-center tw-cursor-pointer tw-w-full tw-px-6 tw-py-4 tw-border-b tw-border-gray-100 hover:tw-bg-gray-50 tw-transition-colors" />
                                    </div>

                                    <div>
                                        <x-checkbox label="Tạo mới người dùng" name="permissions[]" value="users.create"
                                            class="tw-flex tw-items-center tw-cursor-pointer tw-w-full tw-px-6 tw-py-4 tw-border-b tw-border-gray-100 hover:tw-bg-gray-50 tw-transition-colors" />
                                    </div>

                                    <div>
                                        <x-checkbox label="Chỉnh sửa người dùng" name="permissions[]" value="users.edit"
                                            class="tw-flex tw-items-center tw-cursor-pointer tw-w-full tw-px-6 tw-py-4 tw-border-b tw-border-gray-100 hover:tw-bg-gray-50 tw-transition-colors" />
                                    </div>

                                    <div>
                                        <x-checkbox label="Xóa người dùng" name="permissions[]" value="users.remove"
                                            class="tw-flex tw-items-center tw-cursor-pointer tw-w-full tw-px-6 tw-py-4 tw-border-b tw-border-gray-100 hover:tw-bg-gray-50 tw-transition-colors" />
                                    </div>
                                </div>
                            </div>

                            {{-- ----- Roles & Permissions --------- --}}
                            <div class="permission-group tw-bg-white">
                                <div
                                    class="accordion-header tw-flex tw-items-center tw-justify-between tw-px-6 tw-py-3 tw-border-b tw-border-gray-100 hover:tw-bg-gray-50 tw-cursor-pointer tw-transition-colors">
                                    <div class="tw-flex tw-items-center tw-gap-4">
                                        <div class="tw-w-5 tw-flex tw-justify-center tw-shrink-0">
                                            <i
                                                class="fas fa-chevron-right tw-text-gray-500 tw-text-sm tw-transition-transform tw-duration-200 accordion-icon"></i>
                                        </div>
                                        <div>
                                            <span class="tw-font-bold tw-text-gray-900 tw-text-sm tw-block">
                                                Vai trò & Phân quyền (Roles)
                                            </span>
                                            <span class="tw-text-xs tw-text-gray-500 tw-font-normal tw-mt-0.5 tw-block">
                                                Quản lý các nhóm quyền hạn trong hệ thống
                                            </span>
                                        </div>
                                    </div>

                                    <div onclick="event.stopPropagation()">
                                        <x-checkbox name="check_all" label="Chọn tất cả"
                                            class="tw-px-3 tw-py-1 tw-bg-white tw-border tw-border-gray-200 tw-rounded tw-shadow-sm hover:tw-bg-gray-50 tw-transition-colors" />
                                    </div>
                                </div>

                                <div class="accordion-body tw-hidden tw-flex tw-flex-col">
                                    <div>
                                        <x-checkbox label="Xem vai trò và phân quyền" name="permissions[]"
                                            value="roles.view"
                                            class="tw-flex tw-items-center tw-cursor-pointer tw-w-full tw-px-6 tw-py-4 tw-border-b tw-border-gray-100 hover:tw-bg-gray-50 tw-transition-colors" />
                                    </div>

                                    <div>
                                        <x-checkbox label="Tạo mới vai trò và phân quyền" name="permissions[]"
                                            value="roles.create"
                                            class="tw-flex tw-items-center tw-cursor-pointer tw-w-full tw-px-6 tw-py-4 tw-border-b tw-border-gray-100 hover:tw-bg-gray-50 tw-transition-colors" />
                                    </div>

                                    <div>
                                        <x-checkbox label="Chỉnh sửa vai trò và phân quyền" name="permissions[]"
                                            value="roles.edit"
                                            class="tw-flex tw-items-center tw-cursor-pointer tw-w-full tw-px-6 tw-py-4 tw-border-b tw-border-gray-100 hover:tw-bg-gray-50 tw-transition-colors" />
                                    </div>

                                    <div>
                                        <x-checkbox label="Xóa vai trò và phân quyền" name="permissions[]"
                                            value="roles.remove"
                                            class="tw-flex tw-items-center tw-cursor-pointer tw-w-full tw-px-6 tw-py-4 tw-border-b tw-border-gray-100 hover:tw-bg-gray-50 tw-transition-colors" />
                                    </div>
                                </div>
                            </div>

                            {{-- ----- AUDIT LOGS --------- --}}
                            <div class="permission-group tw-bg-white">
                                <div
                                    class="accordion-header tw-flex tw-items-center tw-justify-between tw-px-6 tw-py-3 tw-border-b tw-border-gray-100 hover:tw-bg-gray-50 tw-cursor-pointer tw-transition-colors">
                                    <div class="tw-flex tw-items-center tw-gap-4">
                                        <div class="tw-w-5 tw-flex tw-justify-center tw-shrink-0">
                                            <i
                                                class="fas fa-chevron-right tw-text-gray-500 tw-text-sm tw-transition-transform tw-duration-200 accordion-icon"></i>
                                        </div>
                                        <div>
                                            <span class="tw-font-bold tw-text-gray-900 tw-text-sm tw-block">
                                                Lịch sử Hoạt động (Audit Logs)
                                            </span>
                                            <span class="tw-text-xs tw-text-gray-500 tw-font-normal tw-mt-0.5 tw-block">
                                                Tra cứu lịch sử truy cập và thay đổi dữ liệu
                                            </span>
                                        </div>
                                    </div>

                                    <div onclick="event.stopPropagation()">
                                        <x-checkbox name="check_all" label="Chọn tất cả"
                                            class="tw-px-3 tw-py-1 tw-bg-white tw-border tw-border-gray-200 tw-rounded tw-shadow-sm hover:tw-bg-gray-50 tw-transition-colors" />
                                    </div>
                                </div>

                                <div class="accordion-body tw-hidden tw-flex tw-flex-col">

                                    <div>
                                        <x-checkbox label="Xem danh sách logs" name="permissions[]" value="log.view"
                                            class="tw-flex tw-items-center tw-cursor-pointer tw-w-full tw-px-6 tw-py-4 tw-border-b tw-border-gray-100 hover:tw-bg-gray-50 tw-transition-colors" />
                                    </div>

                                    <div>
                                        <x-checkbox label="Xem chi tiết" name="permissions[]" value="log.detail"
                                            class="tw-flex tw-items-center tw-cursor-pointer tw-w-full tw-px-6 tw-py-4 tw-border-b tw-border-gray-100 hover:tw-bg-gray-50 tw-transition-colors" />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div
                    class="tw-sticky tw-bottom-0 tw-z-40 tw-mt-8 tw-bg-white/80 tw-backdrop-blur-sm tw-border-t tw-border-gray-200 tw-p-4 tw-rounded-t-xl tw-shadow-[0_-8px_20px_-10px_rgba(0,0,0,0.1)] tw-flex tw-justify-end tw-items-center tw-gap-2">
                    <button type="submit"
                        class="tw-min-w-[96px] tw-px-4 tw-py-1.5 tw-text-[14px] tw-font-medium tw-text-white tw-bg-[#0078D4] tw-border tw-border-transparent tw-rounded-[4px] hover:tw-bg-[#106ebe] tw-shadow-sm tw-transition-colors tw-flex tw-items-center tw-justify-center">
                        Save
                    </button>
                    <a href="{{ route('roles.index') }}"
                        class="tw-min-w-[96px] tw-px-4 tw-py-1.5 tw-text-[14px] tw-font-medium tw-text-gray-700 tw-bg-white tw-border tw-border-gray-300 tw-rounded-[4px] hover:tw-bg-gray-50 hover:tw-text-gray-900 tw-shadow-sm tw-transition-colors tw-flex tw-items-center tw-justify-center">
                        Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            $(function() {
                $('.accordion-header').on('click', function() {
                    let $header = $(this);
                    let $body = $header.next('.accordion-body');
                    let $icon = $header.find('.accordion-icon');

                    $body.slideToggle(250);

                    if ($icon.hasClass('tw-rotate-90')) {
                        $icon.removeClass('tw-rotate-90');
                    } else {
                        $icon.addClass('tw-rotate-90');
                    }
                });

                $('.permission-group').on('change', 'input[name="check_all"]', function() {
                    let isChecked = $(this).prop('checked');

                    $(this)
                        .closest('.permission-group')
                        .find('input[name="permissions[]"]')
                        .prop('checked', isChecked);

                    updateGlobalCheckButton();
                });

                $('.permission-group').on('change', 'input[name="permissions[]"]', function() {
                    let $group = $(this).closest('.permission-group');
                    let total = $group.find('input[name="permissions[]"]').length;
                    let checked = $group.find('input[name="permissions[]"]:checked').length;

                    $group.find('input[name="check_all"]').prop('checked', total === checked);

                    updateGlobalCheckButton();
                });

                let globalToggle = false;
                $('#btn-check-all-global').on('click', function() {
                    globalToggle = !globalToggle;

                    $('input[name="permissions[]"], input[name="check_all"]').prop('checked', globalToggle);

                    $(this).text(globalToggle ? 'Bỏ chọn tất cả' : 'Chọn tất cả toàn hệ thống');
                });

                function updateGlobalCheckButton() {
                    let totalPerms = $('input[name="permissions[]"]').length;
                    let checkedPerms = $('input[name="permissions[]"]:checked').length;

                    globalToggle = (totalPerms === checkedPerms && totalPerms > 0);
                    $('#btn-check-all-global').text(globalToggle ? 'Bỏ chọn tất cả' : 'Chọn tất cả toàn hệ thống');
                }

                // --- Submit form ----------
                $('#role-form').on('submit', function(e) {
                    e.preventDefault();

                    let $form = $(this);
                    let $submitBtn = $form.find('button[type="submit"]');
                    let originalText = $submitBtn.html();

                    $form.find('.field-error').remove();
                    $form.find('.tw-border-red-500').removeClass(
                        'tw-border-red-500 focus:tw-border-red-500 focus:tw-ring-red-500').addClass(
                        'tw-border-gray-300');

                    $submitBtn.prop('disabled', true).html(
                        '<i class="fas fa-spinner fa-spin tw-mr-2"></i> Đang xử lý...');

                    $.ajax({
                        url: $form.attr('action'),
                        type: 'POST',
                        data: $form.serialize(),
                        dataType: 'json',
                        success: function(res, textStatus, xhr) {
                            if (res.success) {
                                window.location.href = res.redirect;
                            }
                        },
                        error: function(xhr) {
                            $submitBtn.prop('disabled', false).html(originalText);

                            if (xhr.status === 422) {
                                $.each(xhr.responseJSON.errors, function(field, messages) {
                                    let input = $form.find(`[name="${field}"]`);
                                    let errorMessage = messages[0];

                                    if (input.length) {
                                        let wrapper = input.parent();
                                        input
                                            .removeClass('tw-border-gray-300')
                                            .addClass(
                                                'tw-border-red-500 focus:tw-border-red-500 focus:tw-ring-red-500'
                                            );
                                        wrapper.append(`
                                            <span class="field-error tw-block tw-text-red-500 tw-text-xs tw-mt-1.5 tw-font-medium tw-flex tw-items-center">
                                                ${errorMessage}
                                            </span>
                                        `);
                                    }
                                })

                                fluentToast({
                                    type: 'error',
                                    title: 'Xử lý thất bại',
                                    description: 'Hãy kiểm tra lại các trường thông tin.',
                                    subtitle: 'Mã lỗi: ' + xhr.status,
                                    actionType: 'close',
                                });
                            } else {
                                
                            }
                        }
                    })
                })
            })
        </script>
    @endpush
@endsection
