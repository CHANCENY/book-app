let UPDATE_DATA = [
  {
    imgSrc: "/themes/books/src/assets/images/profile-2.jpg",
    profileName: "Mike Tyson",
    message: "received his order of Night lion tech GPS drone.",
    updatedTime: "2 Minutes Ago",
  },
  {
    imgSrc: "/themes/books/src/assets/images/profile-3.jpg",
    profileName: "Diana Ayi",
    message: "declined her order of 2 DJI Air 2S.",
    updatedTime: "5 Minutes Ago",
  },
  {
    imgSrc: "/themes/books/src/assets/images/profile-4.jpg",
    profileName: "Mandy Roy",
    message: "received his order of LARVENDER KF102 Drone.",
    updatedTime: "6 Minutes Ago",
  },
];

const xhrauthor = new XMLHttpRequest();
xhrauthor.open('GET', '/dashboard/endpoints/query/books_recent_authors',false);
xhrauthor.onload = function () {
  if(this.status === 200) {
    try{
      UPDATE_DATA = JSON.parse(this.responseText)
    }catch (e) {
      UPDATE_DATA = [];
    }
  }
}
xhrauthor.send();