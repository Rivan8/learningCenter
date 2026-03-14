@php
  $assetBase = rtrim(request()->getBasePath(), '\/');
@endphp

<!-- Modal How -->
<div class="modal fade" id="modalHow" tabindex="-1" aria-labelledby="modalHowLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" style="max-width: 90%; height: 95vh;">
    <div class="modal-content" style="height: 100%;">
      <div class="modal-body" style="height: calc(100% - 120px); overflow-y: auto;">
        <div class="row ">
            <div class="col-md-10 mb-4">
                <div class="position-relative">
                    <div class="ratio ratio-16x9">
                        <video id="videoHow" controls>
                            <source src="{{ $assetBase }}/assets/video/video1.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="position-absolute" style="top: 15px; left: 15px; z-index: 10; opacity: 0.8;">
                        <img src="{{ $assetBase }}/assets/img/kaiadmin/logo_light.svg" alt="Logo" style="max-width: 120px; height: auto;">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <ul class="text-center list-group" id="videoListHow">
                    <li class="list-group-item active-video">
                        <a href="javascript:void(0)" onclick="changeVideoHow('malam.mp4', 0)">Video Malam</a>
                        <div class="progress mt-1" style="height: 5px;">
                            <div class="progress-bar" id="progress-how-0" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                    <li class="list-group-item" id="video2-how-list">
                        <a href="javascript:void(0)" id="video2-how-link" onclick="changeVideoHow('senin.mp4', 1)">Video Senin</a>
                        <div class="progress mt-1" style="height: 5px;">
                            <div class="progress-bar" id="progress-how-1" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                    <li class="list-group-item" id="video3-how-list">
                        <a href="javascript:void(0)" id="video3-how-link" onclick="changeVideoHow('selasa.mp4', 2)">Video Selasa</a>
                        <div class="progress mt-1" style="height: 5px;">
                            <div class="progress-bar" id="progress-how-2" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                    <li class="list-group-item" id="video4-how-list">
                        <a href="javascript:void(0)" id="video4-how-link" onclick="changeVideoHow('rabu.mp4', 3)">Video Rabu</a>
                        <div class="progress mt-1" style="height: 5px;">
                            <div class="progress-bar" id="progress-how-3" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                    <li class="list-group-item" id="video5-how-list">
                        <a href="javascript:void(0)" id="video5-how-link" onclick="changeVideoHow('kamis.mp4', 4)">Video Kamis</a>
                        <div class="progress mt-1" style="height: 5px;">
                            <div class="progress-bar" id="progress-how-4" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('js/video-how.js') }}"></script>
