function updateTime() {
    const date = new Date();

    // Get hours, minutes, and seconds
    let hours = date.getHours() % 12 || 12;
    let minutes = date.getMinutes();
    let seconds = date.getSeconds();

    // Add leading zeros if needed
    hours = hours < 10 ? '0' + hours : hours;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;

    // Determine AM or PM
    const ampm = date.getHours() >= 12 ? 'PM' : 'AM';

    // Display the time
    document.getElementById('time').textContent = `${hours}:${minutes}:${seconds} ${ampm}`;

    // Get day, month, date, and year
    const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    let day = days[date.getDay()];
    let month = months[date.getMonth()];
    let dateNum = date.getDate();
    let year = date.getFullYear();

    // Display the date
    document.getElementById('date').textContent = `${day}, ${month} ${dateNum}, ${year}`;
}

// Call updateTime every second
setInterval(updateTime, 1000);
