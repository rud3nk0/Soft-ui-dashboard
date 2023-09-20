@extends('layouts.user_type.auth')

@section('content')

  <div class="section min-vh-85 position-relative transform-scale-0 transform-scale-md-7">
    <div class="container">
      <div class="row pt-10">
        <div class="col-lg-1 col-md-1 pt-5 pt-lg-0 ms-lg-5 text-center">
          <a href="javascript:;" class="avatar avatar-md border-0" data-bs-toggle="tooltip" data-bs-placement="left" title="My Profile">
            <img class="border-radius-lg" alt="Image placeholder" src="../assets/img/team-1.jpg">
          </a>
          <button class="btn btn-white border-radius-lg p-2 mt-2" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Home">
            <i class="fas fa-home p-2"></i>
          </button>
          <button class="btn btn-white border-radius-lg p-2" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Search">
            <i class="fas fa-search p-2"></i>
          </button>
          <button class="btn btn-white border-radius-lg p-2" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Minimize">
            <i class="fas fa-ellipsis-h p-2"></i>
          </button>
        </div>
        <div class="col-lg-8 col-md-11">
          <div class="d-flex">
            <div class="me-auto">
              <h1 class="display-1 font-weight-bold mt-n4 mb-0">28°C</h1>
              <h6 class="text-uppercase mb-0 ms-1">Cloudy</h6>
            </div>
            <div class="ms-auto">
              <img class="w-50 float-end mt-lg-n4" src="../assets/img/small-logos/icon-sun-cloud.png" alt="image sun">
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-lg-4 col-md-4">
              <div class="card move-on-hover overflow-hidden">
                <div class="card-body">
                  <div class="d-flex">
                    <h6 class="mb-0 me-3">08:00</h6>
                    <h6 class="mb-0">Synk up with Mark
                      <small class="text-secondary font-weight-normal">Hangouts</small>
                    </h6>
                  </div>
                  <hr class="horizontal dark">
                  <div class="d-flex">
                    <h6 class="mb-0 me-3">09:30</h6>
                    <h6 class="mb-0">Gym <br />
                      <small class="text-secondary font-weight-normal">World Class</small>
                    </h6>
                  </div>
                  <hr class="horizontal dark">
                  <div class="d-flex">
                    <h6 class="mb-0 me-3">11:00</h6>
                    <h6 class="mb-0">Design Review<br />
                      <small class="text-secondary font-weight-normal">Zoom</small>
                    </h6>
                  </div>
                </div>
                <a href="javascript:;" class="bg-gray-100 w-100 text-center py-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Show More">
                  <i class="fas fa-chevron-down text-primary"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 mt-4 mt-sm-0">
              <div class="card bg-gradient-dark move-on-hover">
                <div class="card-body">
                  <div class="d-flex">
                    <h5 class="mb-0 text-white">To Do</h5>
                    <div class="ms-auto">
                      <h1 class="text-white text-end mb-0 mt-n2">7</h1>
                      <p class="text-sm mb-0 text-white">items</p>
                    </div>
                  </div>
                  <p class="text-white mb-0">Shopping</p>
                  <p class="mb-0 text-white">Meeting</p>
                </div>
                <a href="javascript:;" class="w-100 text-center py-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Show More">
                  <i class="fas fa-chevron-down text-white"></i>
                </a>
              </div>
              <div class="card move-on-hover mt-4">
                <div class="card-body">
                  <div class="d-flex">
                    <p class="mb-0">Emails (21)</p>
                    <a href="javascript:;" class="ms-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="Check your emails">
                      Check
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 mt-4 mt-sm-0">
              <div class="card card-background card-background-mask-primary move-on-hover align-items-start bg">
                <div class="cursor-pointer">
                  <div class="container" >
                      <img src="" class="active" id="cover">
                  </div>

                  <div class="card-body controll_body">
                    <h5 id="music-title" class="text-white mb-0"></h5>
                    <p id="music-artist" class="text-white text-sm"></p>

                      <div class="player-progress" id="player-progress">
                          <div class="progress" id="progress"></div>
                          <div class="music-duration">
                              <span id="current-time">0:00</span>
                              <span id="duration">0:00</span>
                          </div>
                      </div>

                    <div class="d-flex mt-5">
                        <i class="fas fa-backward p-2" title="Previous" id="prev"></i>
                        <i class="fas fa-play p-2" title="Play" id="play"></i>
                        <i class="fas fa-forward p-2" title="Next" id="next"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <style>
     .card.card-background.card-background-mask-primary:after{
         background: #b2b2b2 !important;
     }

     .controll_body{
         margin-top: 20px;
     }

      .player-progress {
          background-color: #fff;
          border-radius: 5px;
          cursor: pointer;
          margin: 60px 17px 35px;
          height: 7px;
          width: 90%;
      }

      .progress {
          background-color: #212121;
          border-radius: 5px;
          height: 100%;
          width: 0%;
          transition: width 0.1s linear;
      }

      .music-duration {
          position: relative;
          top: -41px;
          display: flex;
          justify-content: space-between;
      }

      #cover{
          width: 266px;
          margin: -25px;
          position: relative;
          z-index: 999999!important;
      }

      .mt-5{
          margin: 0 56px!important;
      }

  </style>

  <script>
      const image = document.getElementById('cover'),
          title = document.getElementById('music-title'),
          artist = document.getElementById('music-artist'),
          currentTimeEl = document.getElementById('current-time'),
          durationEl = document.getElementById('duration'),
          progress = document.getElementById('progress'),
          playerProgress = document.getElementById('player-progress'),
          prevBtn = document.getElementById('prev'),
          nextBtn = document.getElementById('next'),
          playBtn = document.getElementById('play');

      const music = new Audio();

      const songs = [
          {
              path: '/assets/img/1.mp3',
              displayName: 'CALMNESS',
              cover: '/assets/img/1.jpg',
              artist: 'MVTRIIIX',
          },
          {
              path: '/assets/img/2.mp3',
              displayName: 'Rockstar',
              cover: '/assets/img/2.jpg',
              artist: 'Post malone & 21 Savage',
          },
          {
              path: '/assets/img/3.mp3',
              displayName: 'PROPANE DREAMING',
              cover: '/assets/img/3.jpg',
              artist: 'Sorrychai',
          },
          {
              path: '/assets/img/4.mp3',
              displayName: 'Dont Say',
              cover: '/assets/img/4.jpg',
              artist: 'KAIZXKU',
          }
      ];

      let musicIndex = 0;
      let isPlaying = false;

      function togglePlay() {
          if (isPlaying) {
              pauseMusic();
          } else {
              playMusic();
          }
      }

      function playMusic() {
          isPlaying = true;
          // Change play button icon
          playBtn.classList.replace('fa-play', 'fa-pause');
          // Set button hover title
          playBtn.setAttribute('title', 'Pause');
          music.play();
      }

      function pauseMusic() {
          isPlaying = false;
          // Change pause button icon
          playBtn.classList.replace('fa-pause', 'fa-play');
          // Set button hover title
          playBtn.setAttribute('title', 'Play');
          music.pause();
      }

      function loadMusic(song) {
          music.src = song.path;
          title.textContent = song.displayName;
          artist.textContent = song.artist;
          image.src = song.cover;
          // background.src = song.cover;
      }

      function changeMusic(direction) {
          musicIndex = (musicIndex + direction + songs.length) % songs.length;
          loadMusic(songs[musicIndex]);
          playMusic();
      }

      function updateProgressBar() {
          const { duration, currentTime } = music;
          const progressPercent = (currentTime / duration) * 100;
          progress.style.width = `${progressPercent}%`;

          const formatTime = (time) => String(Math.floor(time)).padStart(2, '0');
          durationEl.textContent = `${formatTime(duration / 60)}:${formatTime(duration % 60)}`;
          currentTimeEl.textContent = `${formatTime(currentTime / 60)}:${formatTime(currentTime % 60)}`;
      }

      function setProgressBar(e) {
          const width = playerProgress.clientWidth;
          const clickX = e.offsetX;
          music.currentTime = (clickX / width) * music.duration;
      }

      playBtn.addEventListener('click', togglePlay);
      prevBtn.addEventListener('click', () => changeMusic(-1));
      nextBtn.addEventListener('click', () => changeMusic(1));
      music.addEventListener('ended', () => changeMusic(1));
      music.addEventListener('timeupdate', updateProgressBar);
      playerProgress.addEventListener('click', setProgressBar);

      loadMusic(songs[musicIndex]);

  </script>
@endsection
