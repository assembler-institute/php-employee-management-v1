const HEAD = `<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Employee Management</title>

		<link rel="stylesheet" href="../css/main.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link
			rel="stylesheet"
			href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
			integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
			crossorigin="anonymous"
		/>

		<link type="text/css" rel="stylesheet" href="jsgrid.min.css" />
		<link type="text/css" rel="stylesheet" href="jsgrid-theme.min.css" />

		<script type="text/javascript" src="jsgrid.min.js"></script>

		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
			crossorigin="anonymous"
		/>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	</head>
	<body>
`;

const insertHead = () => {
	//get head element
	document.firstElementChild.insertAdjacentHTML("beforeend", HEAD);
};

insertHead();
