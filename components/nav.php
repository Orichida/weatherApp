<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap"
    rel="stylesheet"
  />
</head>

<body>
  <nav class="navbar">
    <ul class="navbar-nav">
      <li class="logo">
        <a href="/site/components/edit.php" class="nav-link">
          <span class="link-text logo-text"><?php echo $_SESSION["user"]["prenom"] ?></span>
          <svg
            aria-hidden="true"
            focusable="false"
            data-prefix="fad"
            data-icon="angle-double-right"
            role="img"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 448 512"
            class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x"
          >
            <g class="fa-group">
              <path
                fill="currentColor"
                d="M224 273L88.37 409a23.78 23.78 0 0 1-33.8 0L32 386.36a23.94 23.94 0 0 1 0-33.89l96.13-96.37L32 159.73a23.94 23.94 0 0 1 0-33.89l22.44-22.79a23.78 23.78 0 0 1 33.8 0L223.88 239a23.94 23.94 0 0 1 .1 34z"
                class="fa-secondary"
              ></path>
              <path
                fill="currentColor"
                d="M415.89 273L280.34 409a23.77 23.77 0 0 1-33.79 0L224 386.26a23.94 23.94 0 0 1 0-33.89L320.11 256l-96-96.47a23.94 23.94 0 0 1 0-33.89l22.52-22.59a23.77 23.77 0 0 1 33.79 0L416 239a24 24 0 0 1-.11 34z"
                class="fa-primary"
              ></path>
            </g>
          </svg>
        </a>
      </li>

      <li class="nav-item">
        <a href="#search" class="nav-link">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#a3a3a3"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.6725 16.6412L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="a3a3a3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
        <span class="link-text">Search</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="#temp" class="nav-link">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#a3a3a3"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 16.9998L12.0071 17.0069M16 16.9998C16 19.209 14.2091 20.9998 12 20.9998C9.79086 20.9998 8 19.209 8 16.9998C8 15.9854 8.37764 15.0591 9 14.354L9 6C9 4.34315 10.3431 3 12 3C13.6569 3 15 4.34315 15 6V14.354C15.6224 15.0591 16 15.9854 16 16.9998ZM13 16.9998C13 17.5521 12.5523 17.9998 12 17.9998C11.4477 17.9998 11 17.5521 11 16.9998C11 16.4475 11.4477 15.9998 12 15.9998C12.5523 15.9998 13 16.4475 13 16.9998Z" stroke="#a3a3a3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
          <span class="link-text">Temperature</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="#weather" class="nav-link">
        <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#a3a3a3" stroke="#a3a3a3"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#a3a3a3;} </style> <g> <path class="st0" d="M185.158,223.146c2.486,0,4.965,0.076,7.436,0.248c11.88-40.59,41.969-72.75,80.556-87.742 c-17.131-26.503-46.904-44.056-80.804-44.056c-49.751,0-90.689,37.788-95.66,86.236c-6.976-2.162-14.389-3.323-22.066-3.323 C33.411,174.51,0,207.914,0,249.122c0,41.216,33.411,74.619,74.619,74.619h0.746C80.277,267.458,127.625,223.146,185.158,223.146z"></path> <path class="st0" d="M434.638,265.688c-0.03,0-0.06,0.008-0.098,0.008c0.045-1.288,0.098-2.576,0.098-3.872 c0-61.956-50.218-112.174-112.167-112.174c-58.03,0-105.77,44.07-111.578,100.572c-8.136-2.516-16.769-3.873-25.735-3.873 c-48.064,0-87.027,38.964-87.027,87.028c0,48.063,38.963,87.027,87.027,87.027h249.48c42.723,0,77.362-34.631,77.362-77.354 C512,300.32,477.361,265.688,434.638,265.688z"></path> </g> </g></svg>
          <span class="link-text">Weather</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="#wind" class="nav-link">
        <svg viewBox="0 0 30 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#a3a3a3"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>wind-flag</title> <desc>Created with Sketch Beta.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set-Filled" sketch:type="MSLayerGroup" transform="translate(-467.000000, -778.000000)" fill="#a3a3a3"> <path d="M495,780 L491,779.637 L491,791.363 L495,791 C496.104,791 497,790.104 497,789 L497,782 C497,780.896 496.104,780 495,780 L495,780 Z M483,792.091 L489,791.546 L489,779.455 L483,778.909 L483,792.091 L483,792.091 Z M471,780 L471,791 C471,792.104 471.896,793 473,793 L481,792.272 L481,778.728 L473,778 C471.896,778 471,778.896 471,780 L471,780 Z M468,778 C467.447,778 467,778.448 467,779 L467,807 C467,807.553 467.447,808 468,808 C468.553,808 469,807.553 469,807 L469,779 C469,778.448 468.553,778 468,778 L468,778 Z" id="wind-flag" sketch:type="MSShapeGroup"> </path> </g> </g> </g></svg>
          <span class="link-text">Wind</span>
        </a>
      </li>

      <li class="nav-item" id="themeButton">
        <a href="/site/logout.php" class="nav-link">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#878787"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M16.125 12C16.125 11.5858 15.7892 11.25 15.375 11.25L4.40244 11.25L6.36309 9.56944C6.67759 9.29988 6.71401 8.8264 6.44444 8.51191C6.17488 8.19741 5.7014 8.16099 5.38691 8.43056L1.88691 11.4306C1.72067 11.573 1.625 11.7811 1.625 12C1.625 12.2189 1.72067 12.427 1.88691 12.5694L5.38691 15.5694C5.7014 15.839 6.17488 15.8026 6.44444 15.4881C6.71401 15.1736 6.67759 14.7001 6.36309 14.4306L4.40244 12.75L15.375 12.75C15.7892 12.75 16.125 12.4142 16.125 12Z" fill="#a3a3a3"></path> <path d="M9.375 8C9.375 8.70219 9.375 9.05329 9.54351 9.3055C9.61648 9.41471 9.71025 9.50848 9.81946 9.58145C10.0717 9.74996 10.4228 9.74996 11.125 9.74996L15.375 9.74996C16.6176 9.74996 17.625 10.7573 17.625 12C17.625 13.2426 16.6176 14.25 15.375 14.25L11.125 14.25C10.4228 14.25 10.0716 14.25 9.8194 14.4185C9.71023 14.4915 9.6165 14.5852 9.54355 14.6944C9.375 14.9466 9.375 15.2977 9.375 16C9.375 18.8284 9.375 20.2426 10.2537 21.1213C11.1324 22 12.5464 22 15.3748 22L16.3748 22C19.2032 22 20.6174 22 21.4961 21.1213C22.3748 20.2426 22.3748 18.8284 22.3748 16L22.3748 8C22.3748 5.17158 22.3748 3.75736 21.4961 2.87868C20.6174 2 19.2032 2 16.3748 2L15.3748 2C12.5464 2 11.1324 2 10.2537 2.87868C9.375 3.75736 9.375 5.17157 9.375 8Z" fill="#a3a3a3"></path> </g></svg>
          <span class="link-text">LogOut</span>
        </a>
      </li>
    </ul>
  </nav>
</body>