const handleToast = ({
	position = "bottom-end",
	timer = "4000",
	icon = "success",
	message = "",
}) => {
	const toast = Swal.mixin({
		toast: true,
		position: position,
		showConfirmButton: false,
		timer: timer,
		timerProgressBar: true,
		onOpen: (toast) => {
			toast.addEventListener("mouseenter", Swal.stopTimer);
			toast.addEventListener("mouseleave", Swal.resumeTimer);
		},
	});

	toast.fire({
		icon: icon,
		title: message,
	});
};

export { handleToast };
