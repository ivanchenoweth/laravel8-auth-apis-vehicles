import {
    html,
    useEffect,
    useState,
} from "https://unpkg.com/htm/preact/standalone.module.js";

import { VehicleList } from "/js/VehicleList.js";

export function Header({ title }) {
    const [uname, setUname] = useState("");
    const [pass, setPass] = useState("");
    const [isSubmited, setIsSubmited] = useState();
    const [isAccessError, setAccessError] = useState();
    const [token, setToken] = useState();

    useEffect(() => {
        setUname("");
        setIsSubmited(false);
        setPass("");
    }, []);

    const handleSubmit = (event) => {
        event.preventDefault();
        var params = {
            email: uname,
            password: pass,
        };
        axios
            .post("http://localhost:8000/api/v1/login", params)
            .then(function (response) {
                if (response.data.success) {
                    setToken(response.data);
                    setIsSubmited(true);
                } else {
                    setAccessError(true);
                    setIsSubmited(false);
                }
            })
            .catch((error) => console.log(error));
    };

    const handleUname = (event) => {
        setUname(event.target.value);
        setAccessError(false);
    };

    const handlePass = (event) => {
        setPass(event.target.value);
        setAccessError(false);
    };

    function handleAccessError() {
        if (isAccessError == true) {
            return html`
                <div class="text-danger">Access Not authorized !</div>
            `;
        }
    }

    function handleSummited() {
        if (isSubmited == true) {
            return html`
                <div>
                    <${VehicleList} token=${token} />
                </div>
            `;
        }
    }

    return html`
        <div>
            <h1>${title}</h1>
            <div className="app">
                <div className="login-form">                    
                    <div className="form">
                        <form onSubmit=${handleSubmit}>
                            <div className="input-container">
                                <label>Username: </label>
                                <input
                                    type="text"
                                    name="uname"
                                    value=${uname}
                                    required
                                    onChange=${handleUname}
                                    autocomplete="off"
                                />
                            </div>
                            <div className="input-container">
                                <label>Password: </label>
                                <input
                                    type="password"
                                    name="pass"
                                    required
                                    onChange=${handlePass}
                                />
                            </div>
                            <div className="button-container">
                                <input type="submit" />
                            </div>
                            <hr></hr>                            
                        </form>
                    </div>
                </div>
            </div>
            ${handleSummited()} ${handleAccessError()}
        </div>
    `;
}
