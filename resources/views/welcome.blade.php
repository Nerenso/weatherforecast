<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Weather Forecast Leiderdorp</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

  <!-- Styles / Scripts -->
  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  @endif
</head>

<body class="font-sans antialiased bg-slate-50 dark:bg-slate-800 text-slate-900">
  <main class="w-screen min-h-screen bg-neutral-100 pt-8">
    <div
      class="w-full max-w-screen-lg mx-auto rounded-2xl overflow-hidden mb-8 shadow-xl/30 relative h-[350px] flex flex-col items-center justify-center">
      <div class="absolute inset-0 bg-gradient-to-b to-emerald-500/40 from-black/60 z-20"></div>

      <h2 class="text-5xl mb-2 mt-16 font-extrabold text-white z-30">Leiderdorp</h2>
      <section class="w-fit mx-auto text-white/80 z-30">
        <div class="flex w-full items-center justify-center gap-2">
          <h3 class="text-2xl font-medium ">Weather trend is <span
              class="font-bold text-white/90">{{ $weather_trend->trend }}</span>
          </h3>
          @if ($weather_trend->trend == 'rising')
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24">
              <g fill="none" fill-rule="evenodd">
                <path
                  d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
                <path fill="currentColor"
                  d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2m1.984 12.25c-.53.468-1.223.75-1.984.75a3 3 0 0 1-1.984-.75a1 1 0 1 0-1.324 1.5A5 5 0 0 0 12 17a4.98 4.98 0 0 0 3.308-1.25a1 1 0 0 0-1.324-1.5M8.5 8c-1.087 0-1.958.68-2.394 1.552a1 1 0 0 0 1.73.997l.058-.101c.162-.324.41-.448.606-.448c.17 0 .382.095.541.336l.065.112a1 1 0 0 0 1.788-.896C10.457 8.68 9.587 8 8.5 8m7 0c-1.087 0-1.957.68-2.394 1.552a1 1 0 0 0 1.73.997l.058-.101c.162-.324.41-.448.606-.448c.17 0 .382.095.541.336l.065.112a1 1 0 1 0 1.788-.896C17.458 8.68 16.587 8 15.5 8" />
              </g>
            </svg>
          @elseif ($weather_trend->trend == 'falling')
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24">
              <g fill="none" fill-rule="evenodd">
                <path
                  d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
                <path fill="currentColor"
                  d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2m0 11a5 5 0 0 0-3.307 1.25a1 1 0 0 0 1.323 1.5A3 3 0 0 1 12 15a2.98 2.98 0 0 1 1.984.75a1 1 0 1 0 1.324-1.5A5 5 0 0 0 12 13M8.5 8a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3m7 0a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3" />
              </g>
            </svg>
          @endif
        </div>
      </section>
      <img
        src="https://scontent-ams2-1.xx.fbcdn.net/v/t39.30808-6/480694007_1032054612302174_4072837477115034999_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=cc71e4&_nc_ohc=7TDYAHgT6i4Q7kNvwE-eBrr&_nc_oc=AdkyGhEXydadz-uJ9gLb8f61DPCxxFatPaUXkW44HNvKh_1pAK3RlQm6WO9o_KyAdurtgW8GL7VxD8JDgbByBKGi&_nc_zt=23&_nc_ht=scontent-ams2-1.xx&_nc_gid=U-yFOZ6rSqDwMMsHHenPsw&oh=00_AfFXSGaKVOnPVhDSykt0deKf6FCIa-V4VrlhiHm_Vofjng&oe=681DAE97"
        alt="Gemeente Leiderdorp" class="absolute inset-0 w-full h-full object-cover object-center z-10">
    </div>

    <div class="max-w-screen-lg mx-auto w-full">

      <section class="flex mt-16 gap-4 items-center justify-between w-full text-center">

        @foreach ($weather_data as $data_point)
          @if ($data_point['day']->date == $current_date)
            <div
              class="rounded-2xl border shadow-xl/30 border-emerald-600 p-8 w-full bg-gradient-to-br from-emerald-500/40 to-slate-950 text-white min-w-[250px]">

              <p class="text-2xl font-semibold">
                {{ $data_point['day']->week_day }}
              </p>
              <p class="text-lg font-light mb-4">
                {{ $data_point['day']->date }}
              </p>

              <img src="{{ $weather_icons->{$data_point['weather_code']}->day->image }}" alt=""
                class="w-18 mx-auto object-cover">

              <p class="mb-4">
                {{ $weather_icons->{$data_point['weather_code']}->day->description }}
              </p>
              <div class="flex items-start justify-center gap-2">
                <p class="text-5xl font-bold flex items-start">
                  {{ $data_point['temperature_max'] }}<span class="text-2xl">°</span>
                </p>
                <p class="text-2xl text-slate-400 font-bold flex items-start">
                  {{ $data_point['temperature_min'] }}<span class="text-lg">°</span>
                </p>
              </div>

              <div class="flex items-center gap-1 justify-center mt-6 text-slate-300">
                @if ($data_point['temperature_max'] > 40)
                  <div class="temperature-high">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 1024 1792">
                      <path fill="currentColor"
                        d="M640 1344q0 80-56 136t-136 56t-136-56t-56-136q0-60 35-110t93-71V512h128v651q58 21 93 71t35 110m128 0q0-77-34-144t-94-112V320q0-80-56-136t-136-56t-136 56t-56 136v768q-60 45-94 112t-34 144q0 133 93.5 226.5T448 1664t226.5-93.5T768 1344m128 0q0 185-131.5 316.5T448 1792t-316.5-131.5T0 1344q0-182 128-313V320q0-133 93.5-226.5T448 0t226.5 93.5T768 320v711q128 131 128 313m128-576v128H832V768zm0-256v128H832V512zm0-256v128H832V256z" />
                    </svg>
                  </div>
                @endif

                @if ($data_point['temperature_max'] < 10 || $data_point['temperature_min'] < 10)
                  <div class="temperature-low">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 1024 1792">
                      <path fill="currentColor"
                        d="M640 1344q0 80-56 136t-136 56t-136-56t-56-136q0-60 35-110t93-71v-139h128v139q58 21 93 71t35 110m128 0q0-77-34-144t-94-112V320q0-80-56-136t-136-56t-136 56t-56 136v768q-60 45-94 112t-34 144q0 133 93.5 226.5T448 1664t226.5-93.5T768 1344m128 0q0 185-131.5 316.5T448 1792t-316.5-131.5T0 1344q0-182 128-313V320q0-133 93.5-226.5T448 0t226.5 93.5T768 320v711q128 131 128 313m128-576v128H832V768zm0-256v128H832V512zm0-256v128H832V256z" />
                    </svg>
                  </div>
                @endif

                @if ($data_point['rain'] > 0)
                  <div class="swimming">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 15 15">
                      <path fill="currentColor"
                        d="M10.111 2c-.112 0-.435.147-.435.147l-3.322 1.68c-.443.175-.618.881-.352 1.234l.97 1.408l-3.97 2.029L5 9.998l2.502-1.5l2.5 1.5l1.002-1.002l-3-4l2.557-1.53c.528-.266.443-.704.443-.97C11 2.286 10.644 2 10.111 2m2.141 3a1.75 1.75 0 1 0-.003 3.501A1.75 1.75 0 0 0 12.252 5M2.5 10L0 11.5V13l2.5-1.5L5 13l2.502-1.5l2.5 1.5L12 11.5l3 1.5v-1.5L12 10l-1.998 1.5l-2.5-1.5L5 11.5z" />
                    </svg>
                  </div>
                @endif

                @if ($data_point['wind_speed'] > 39)
                  <div class="hurricane">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24">
                      <path fill="currentColor"
                        d="M15 6.79c1.86 1.07 3 3.06 3 5.21C18 22 6 22 6 22c1.25-.94 2.38-2.05 3.34-3.29a.99.99 0 0 0-.34-1.5C7.14 16.14 6 14.15 6 12C6 2 18 2 18 2c-1.25.94-2.38 2.05-3.34 3.29a.99.99 0 0 0 .34 1.5M12 14a2 2 0 0 0 2-2a2 2 0 0 0-2-2a2 2 0 0 0-2 2a2 2 0 0 0 2 2" />
                    </svg>
                  </div>
                @endif
              </div>
            </div>
          @else
            <div
              class="rounded-xl border border-slate-200 p-4 w-full bg-gradient-to-br from-slate-50 to-slate-200 h-[258px]">

              <p class="text-xl font-medium">
                {{ $data_point['day']->week_day }}
              </p>
              <p class="text-sm font-light mb-2">
                {{ $data_point['day']->date }}
              </p>

              <img src="{{ $weather_icons->{$data_point['weather_code']}->day->image }}" alt=""
                class="w-12 mx-auto object-cover mb-1 mt-4">
              <p class="mb-4 text-xs">
                {{ $weather_icons->{$data_point['weather_code']}->day->description }}
              </p>
              <div class="flex items-start justify-center gap-2">
                <p class="text-3xl font-bold flex items-start">
                  {{ $data_point['temperature_max'] }}<span class="text-lg">°</span>
                </p>
                <p class="text-lg text-slate-500 font-bold flex items-start">
                  {{ $data_point['temperature_min'] }}<span class="text-base">°</span>
                </p>
              </div>

              <div class="flex items-center gap-1 justify-center mt-4 text-slate-600">
                @if ($data_point['temperature_max'] > 40)
                  <div class="temperature-high">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 1024 1792">
                      <path fill="currentColor"
                        d="M640 1344q0 80-56 136t-136 56t-136-56t-56-136q0-60 35-110t93-71V512h128v651q58 21 93 71t35 110m128 0q0-77-34-144t-94-112V320q0-80-56-136t-136-56t-136 56t-56 136v768q-60 45-94 112t-34 144q0 133 93.5 226.5T448 1664t226.5-93.5T768 1344m128 0q0 185-131.5 316.5T448 1792t-316.5-131.5T0 1344q0-182 128-313V320q0-133 93.5-226.5T448 0t226.5 93.5T768 320v711q128 131 128 313m128-576v128H832V768zm0-256v128H832V512zm0-256v128H832V256z" />
                    </svg>
                  </div>
                @endif

                @if ($data_point['temperature_max'] < 10 || $data_point['temperature_min'] < 10)
                  <div class="temperature-low">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 1024 1792">
                      <path fill="currentColor"
                        d="M640 1344q0 80-56 136t-136 56t-136-56t-56-136q0-60 35-110t93-71v-139h128v139q58 21 93 71t35 110m128 0q0-77-34-144t-94-112V320q0-80-56-136t-136-56t-136 56t-56 136v768q-60 45-94 112t-34 144q0 133 93.5 226.5T448 1664t226.5-93.5T768 1344m128 0q0 185-131.5 316.5T448 1792t-316.5-131.5T0 1344q0-182 128-313V320q0-133 93.5-226.5T448 0t226.5 93.5T768 320v711q128 131 128 313m128-576v128H832V768zm0-256v128H832V512zm0-256v128H832V256z" />
                    </svg>
                  </div>
                @endif

                @if ($data_point['rain'] > 0)
                  <div class="swimming">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 15 15">
                      <path fill="currentColor"
                        d="M10.111 2c-.112 0-.435.147-.435.147l-3.322 1.68c-.443.175-.618.881-.352 1.234l.97 1.408l-3.97 2.029L5 9.998l2.502-1.5l2.5 1.5l1.002-1.002l-3-4l2.557-1.53c.528-.266.443-.704.443-.97C11 2.286 10.644 2 10.111 2m2.141 3a1.75 1.75 0 1 0-.003 3.501A1.75 1.75 0 0 0 12.252 5M2.5 10L0 11.5V13l2.5-1.5L5 13l2.502-1.5l2.5 1.5L12 11.5l3 1.5v-1.5L12 10l-1.998 1.5l-2.5-1.5L5 11.5z" />
                    </svg>
                  </div>
                @endif

                @if ($data_point['wind_speed'] > 39)
                  <div class="hurricane">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24">
                      <path fill="currentColor"
                        d="M15 6.79c1.86 1.07 3 3.06 3 5.21C18 22 6 22 6 22c1.25-.94 2.38-2.05 3.34-3.29a.99.99 0 0 0-.34-1.5C7.14 16.14 6 14.15 6 12C6 2 18 2 18 2c-1.25.94-2.38 2.05-3.34 3.29a.99.99 0 0 0 .34 1.5M12 14a2 2 0 0 0 2-2a2 2 0 0 0-2-2a2 2 0 0 0-2 2a2 2 0 0 0 2 2" />
                    </svg>
                  </div>
                @endif
              </div>

            </div>
          @endif
        @endforeach
      </section>


    </div>
  </main>
</body>

</html>
