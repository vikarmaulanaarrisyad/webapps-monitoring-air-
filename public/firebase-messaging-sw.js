importScripts("https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js");

firebase.initializeApp({
    apiKey: "AIzaSyCPSPgjsLLq_KmgBvE_xVyy_0BcVMHsM2w",
    authDomain: "notification-22b68.firebaseapp.com",
    projectId: "notification-22b68",
    storageBucket: "notification-22b68.appspot.com",
    messagingSenderId: "976012907275",
    appId: "1:976012907275:web:906433d0413d5d9de2880e",
});

const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function (payload) {
    var title = payload.data.title;

    var options = {
        body: payload.data.body,
        icon: payload.data.icon,
        image: payload.data.image,
    };

    return self.registration.showNotification(title, options);
});
