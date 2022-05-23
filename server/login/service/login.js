function login(req) {
    const user = req.body;

    console.log(user);

    return 'ok';
}

module.exports = {
	login: login
};