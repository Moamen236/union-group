@extends('admin.layouts.app')

@section('content')
    @include('admin.components.common.page-breadcrumb', ['pageTitle' => 'Line Chart'])
    <div class="space-y-6">
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Line Chart 1</h3>
            </div>
            <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <div class="space-y-6">
                    <!-- ====== Line Chart One Start -->
                    <div class="custom-scrollbar max-w-full overflow-x-auto">
                        <div id="chartThree" class="min-w-[1000px]"></div>
                    </div>
                    <!-- ====== Line Chart One End -->
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Line Chart 2</h3>
            </div>
            <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <div class="space-y-6">
                    <!-- ====== Line Chart Two Start -->
                    <div class="custom-scrollbar max-w-full overflow-x-auto">
                        <div id="chartEight" class="min-w-[1000px]"></div>
                    </div>
                    <!-- ====== Line Chart Two End -->
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Line Chart 3</h3>
            </div>
            <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <div class="space-y-6">
                    <!-- ====== Line Chart Three Start -->
                    <div class="custom-scrollbar max-w-full overflow-x-auto">
                        <div id="chartThirteen" class="min-w-[1000px]"></div>
                    </div>
                    <!-- ====== Line Chart Three End -->
                </div>
            </div>
        </div>
    </div>
@endsection
