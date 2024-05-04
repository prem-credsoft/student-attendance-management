<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Send SMS with Firebase</title>
</head>
<body>

<script src="https://www.gstatic.com/firebasejs/9.6.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.6.0/firebase-messaging.js"></script>

<script>
// Initialize Firebase
const firebaseConfig = {
    apiKey: "AIzaSyDiRPviAD63b6SRPF5_SsL4OP2GeK1oKK0",
  authDomain: "rie-portal-f8c92.firebaseapp.com",
  projectId: "rie-portal-f8c92",
  storageBucket: "rie-portal-f8c92.appspot.com",
  messagingSenderId: "933682240383",
  appId: "1:933682240383:web:c20531feaf4250d004d84a"
};

firebase.initializeApp(firebaseConfig);

const messaging = firebase.messaging();

// Function to send SMS
function sendSMS() {
  const phoneNumber = '+919998639640'; // Set your recipient's phone number
  const message = {
    notification: {
      title: 'fbs sms',
      body: 'fbs trial message. Admissions now open'
    },
    target: {
      phoneNumber
    }
  };

  messaging.send(message)
    .then(() => {
      console.log('SMS sent successfully!');
    })
    .catch((error) => {
      console.error('Error sending SMS:', error);
    });
}
</script>

<button onclick="sendSMS()">Send SMS</button>

</body>
</html>
