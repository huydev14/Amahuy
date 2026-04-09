<div id="tab-activity" class="tab-pane tw-hidden">
    <div class="tw-flex tw-items-center tw-justify-between tw-mb-6">
        <h3 class="tw-text-base tw-font-semibold tw-text-gray-900">Lịch sử hoạt động</h3>
    </div>
    <div class="tw-relative ">
        @forelse ($activities as $log)
            <div class="tw-mb-8 tw-border-l-2 tw-border-gray-400/50">
                <div class="tw-ml-2">
                    <h5 class="tw-font-semibold tw-text-gray-900 tw-text-sm">
                        {{ $log->description }}
                    </h5>
                    <time class="tw-block tw-mb-3 tw-text-xs tw-font-normal tw-text-gray-500 tw-mt-1">
                        {{ $log->created_at->format('H:i - d/m/Y') }}

                        @if ($log->causer)
                            <span class="tw-mx-1">•</span> Thực hiện bởi
                            <span class="tw-font-medium tw-text-p tw-font-bold">
                                <a href="{{ route('users.show', $log->causer_id) }}">{{ $log->causer->name }}</a>
                            </span>
                        @endif
                    </time>
                </div>

                @if (isset($log->properties['old']) && isset($log->properties['attributes']))
                    <div class="tw-bg-gray-50 tw-rounded-sm tw-border tw-border-gray-100 tw-p-1 tw-mt-2">
                        <ul class="tw-space-y-3">
                            @foreach ($log->properties['attributes'] as $key => $newValue)
                                @php
                                    if ($key === 'updated_at') {
                                        continue;
                                    }

                                    $oldValue = $log->properties['old'][$key] ?? 'Trống';

                                    if ($oldValue == $newValue) {
                                        continue;
                                    }
                                @endphp
                                <li class="tw-flex tw-items-start tw-gap-3 tw-text-sm">
                                    <span
                                        class="tw-text-gray-500 tw-w-28 tw-shrink-0 tw-font-medium">{{ ucfirst($key) }}:</span>
                                    <div class="tw-flex tw-items-center tw-flex-wrap tw-gap-2 tw-text-gray-900">
                                        <span
                                            class="tw-line-through tw-text-gray-500 tw-text-xs tw-bg-gray-200 tw-px-1 tw-rounded-sm">
                                            {{ $oldValue ?: 'Trống' }}
                                        </span>

                                        <i class="fas fa-arrow-right tw-text-gray-300 tw-text-[10px]"></i>

                                        <span
                                            class="tw-bg-green-100/50 tw-text-green-700 tw-font-medium tw-px-1 tw-rounded-sm">
                                            {{ $newValue ?: 'Trống' }}
                                        </span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        @empty
            <div class="tw-text-center tw-py-10">
                <i class="fas fa-history tw-text-4xl tw-text-gray-200 tw-mb-3"></i>
                <p class="tw-text-sm tw-text-gray-500">Chưa có lịch sử hoạt động nào được ghi nhận.</p>
            </div>
        @endforelse
    </div>
</div>
