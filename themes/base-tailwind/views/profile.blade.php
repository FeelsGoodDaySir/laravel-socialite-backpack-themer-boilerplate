<x-app-layout>
	<x-slot name="header">

	</x-slot>

	<div class="container mx-auto my-5 p-5">
		<div class="md:flex no-wrap md:-mx-2 ">
			<!-- Left Side -->
			<div class="w-full md:w-3/12 md:mx-2">
				<!-- Profile Card -->
				<div class="bg-white p-3 border-t-4 border-green-400">
					<div class="image overflow-hidden">
						@if (Auth::user()->image)
						<img class="h-auto w-full mx-auto"
							src="{{Auth::user()->image}}"
							alt="{{Auth::user()->name}}">
						@else
						<img class="h-auto w-full mx-auto" 
							src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"
							alt="{{ Auth::user()->name }}">
						@endif
					</div>
					<h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{ Auth::user()->name }}</h1>
					<h3 class="text-gray-600 font-lg text-semibold leading-6">{{ $company ?? 'Company' }}.</h3>
					<p class="text-sm text-gray-500 hover:text-gray-600 leading-6">{{ $description ?? 'Profile Short Description' }}</p>
					<ul
						class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
						<li class="flex items-center py-3">
							<span>Status</span>
							<span class="ml-auto"><span
									class="bg-green-500 py-1 px-2 rounded text-white text-sm">Active</span></span>
						</li>
						<li class="flex items-center py-3">
							<span>Member since</span>
							<span class="ml-auto">{{ Auth::user()->created_at->format('M d, Y') }}</span>
						</li>
					</ul>
				</div>
				<!-- End of profile card -->
				<div class="my-4"></div>
				<!-- Friends card -->
				@php
				$friends = \App\Models\User::inRandomOrder()->limit(3)->select('id', 'name', 'image')->where('email', '!=', Auth::user()->email)->get();
				@endphp
				<div class="bg-white p-3 hover:shadow">
					<div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
						<span class="text-green-500">
							<svg class="h-5 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none"
								viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
							</svg>
						</span>
						<span>Similar Profiles</span>
					</div>
					
					<div class="grid grid-cols-3">
						@foreach ( $friends as $friend )
						<div class="text-center my-2">
							<img class="h-16 w-16 rounded-full mx-auto"
								src="{{ $friend['image'] ? $friend['image'] : 'https://ui-avatars.com/api/?name='. $friend['name'] }}"
								alt="">
							<a href="/profile/{{ $friend['id'] }}" class="text-main-color">{{ $friend['name'] }}</a>
						</div>
						@endforeach
					</div>
				</div>
				<!-- End of friends card -->
			</div>
			<!-- Right Side -->
			<div class="w-full md:w-9/12 mx-2 h-64">
				<!-- Profile tab -->
				<!-- About Section -->
				<div class="bg-white p-3 shadow-sm rounded-sm">
					<div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
						<span clas="text-green-500">
							<svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
								stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
							</svg>
						</span>
						<span class="tracking-wide">About</span>
					</div>
					<div class="text-gray-700">
						<div class="grid md:grid-cols-2 text-sm">
							<div class="grid grid-cols-2">
								<div class="px-4 py-2 font-semibold">Name</div>
								<div class="px-4 py-2">{{ Auth::user()->name }}</div>
							</div>
							<div class="grid grid-cols-2">
								<div class="px-4 py-2 font-semibold"></div>
								<div class="px-4 py-2"></div>
							</div>
							<div class="grid grid-cols-2">
								<div class="px-4 py-2 font-semibold"></div>
								<div class="px-4 py-2"></div>
							</div>
							<div class="grid grid-cols-2">
								<div class="px-4 py-2 font-semibold">Contact No.</div>
								<div class="px-4 py-2">+11 998001001</div>
							</div>
							<div class="grid grid-cols-2">
								<div class="px-4 py-2 font-semibold">Current Address</div>
								<div class="px-4 py-2">Beech Creek, PA, Pennsylvania</div>
							</div>
							<div class="grid grid-cols-2">
								<div class="px-4 py-2 font-semibold">Permanent Address</div>
								<div class="px-4 py-2">Arlington Heights, IL, Illinois</div>
							</div>
							<div class="grid grid-cols-2">
								<div class="px-4 py-2 font-semibold">Email.</div>
								<div class="px-4 py-2">
									<a class="text-blue-800" href="mailto:jane@example.com">{{ Auth::user()->email }}</a>
								</div>
							</div>
							<div class="grid grid-cols-2">
								<div class="px-4 py-2 font-semibold">Birthday</div>
								<div class="px-4 py-2">Feb 06, 1998</div>
							</div>
						</div>
					</div>
					<button
						class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Show
						Full Information</button>
				</div>
				<!-- End of about section -->

				<div class="my-4"></div>

				<!-- Experience and education -->
				<div class="bg-white p-3 shadow-sm rounded-sm">

					<div class="grid grid-cols-2">
						<div>
							<div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
								<span clas="text-green-500">
									<svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
										stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
									</svg>
								</span>
								<span class="tracking-wide">Experience</span>
							</div>
							<ul class="list-inside space-y-2">
								<li>
									<div class="text-teal-600">Owner at Her Company Inc.</div>
									<div class="text-gray-500 text-xs">March 2020 - Now</div>
								</li>
								<li>
									<div class="text-teal-600">Owner at Her Company Inc.</div>
									<div class="text-gray-500 text-xs">March 2020 - Now</div>
								</li>
								<li>
									<div class="text-teal-600">Owner at Her Company Inc.</div>
									<div class="text-gray-500 text-xs">March 2020 - Now</div>
								</li>
								<li>
									<div class="text-teal-600">Owner at Her Company Inc.</div>
									<div class="text-gray-500 text-xs">March 2020 - Now</div>
								</li>
							</ul>
						</div>
						<div>
							<div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
								<span clas="text-green-500">
									<svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
										stroke="currentColor">
										<path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
										<path fill="#fff"
											d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
									</svg>
								</span>
								<span class="tracking-wide">Education</span>
							</div>
							<ul class="list-inside space-y-2">
								<li>
									<div class="text-teal-600">Masters Degree in Oxford</div>
									<div class="text-gray-500 text-xs">March 2020 - Now</div>
								</li>
								<li>
									<div class="text-teal-600">Bachelors Degreen in LPU</div>
									<div class="text-gray-500 text-xs">March 2020 - Now</div>
								</li>
							</ul>
						</div>
					</div>
					<!-- End of Experience and education grid -->
				</div>
				<!-- End of profile tab -->
			</div>
		</div>
	</div>
	</div>
</x-app-layout>