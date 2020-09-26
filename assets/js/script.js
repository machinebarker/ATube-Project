const play = document.querySelector('audio');
const cover = document.querySelector('.cover-song');

play.addEventListener('play', () => {
	cover.classList.add('song-cover');
});

play.addEventListener('pause', () => {
	cover.classList.remove('song-cover');
});
