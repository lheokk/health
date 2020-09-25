function message(m, t){
    Notifications.push({
					imagePath: "/i/image/admin/" + t + ".png",
					text: "<div>" + m + "</div>",
					autoDismiss: 10
				  });
}