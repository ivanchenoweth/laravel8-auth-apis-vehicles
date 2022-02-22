import {
    html,
    useEffect,
    useState,
} from "https://unpkg.com/htm/preact/standalone.module.js";

export function VehicleList(props) {
    const [vehicles, setVehicles] = useState();
    const [brand, setBrand] = useState();
    const [type, setType] = useState();
    const [isAccessError, setAccessError] = useState();

    useEffect(() => {
        if (props) {
            refreshVehicleList(props);
        }
    }, [props]);

    function refreshVehicleList(props) {
        axios
            .get("http://localhost:8000/api/v1/vehicles", {
                headers: {
                    Authorization: `Bearer ${props.token.message.api_token}`,
                },
            })
            .then(function (response) {
                setVehicles(response.data.payload.data);
                setType("Sedan");
            })
            .catch((error) => console.log(error));
    }

    function listVehicles() {
        if (vehicles) {
            return vehicles.map(displayVehicle);
        }
        return html` <div>No vehicles</div> `;
    }

    function displayVehicle(item) {
        return html`
            <tr>
                <td>${item.id}</td>
                <td>${item.brand}</td>
                <td>${item.type}</td>
                <td>${item.tires}</td>
                <td>${item.powermotor}</td>
                <td>-</td>
            </tr>
        `;
    }

    function handleAccessError() {
        if (isAccessError == true) {
            return html`
                <div class="text-danger">Brand field is required</div>
            `;
        }
    }

    function newVehicle() {
        if (!brand) {
            setAccessError(true);
        } else {
            axios
                .post(
                    "http://localhost:8000/api/v1/vehicles",
                    {
                        brand: brand,
                        type: type,
                    },
                    {
                        headers: {
                            "Content-Type": "application/json;charset=UTF-8",
                            "Access-Control-Allow-Origin": "*",
                            Authorization: `Bearer ${props.token.message.api_token}`,
                        },
                    }
                )
                .then(function (response) {
                    refreshVehicleList(props);
                })
                .catch((error) => console.log(error));
        }
    }

    function handleBrand(event) {
        setAccessError(false);
        setBrand(event.target.value);
    }

    function handleType(event) {
        setType(event.target.value);
    }

    // List of vechicles
    return html`
        <div className="input-container">
            <h2>Welcome <b>${props.token.message.name}</b></h2>

            <div class="form-group">
                <label>Brand:</label>
                <input placeholder="Brand" 
                    name="brand" 
                    type="text" 
                    required 
                    onChange=${handleBrand}
                    autocomplete="off" 
                />
                ${handleAccessError()}
            </div>
            <div class="form-group">
                <label>Type:</label>
                <select name="type" onChange=${handleType}>
                    <option value="Sedan" selected="selected">Sedan</option>
                    <option value="Motorcycle">Motorcycle</option>
                </select>
                <li>Sedan Has 4 tires and 120HP</li>
                <li>Motorcycle Has 2 tires and 50HP</li>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="vehicle-header">                        
                        <div class="float-left">
                            <button
                                type="button"
                                class="btn btn-primary btn-sm float-left"
                                onClick=${newVehicle}
                            >
                                Create New
                            </button>
                        </div>

                    </div>
                         
                    <div class="vehicled-body">                    
                        <div class="table-responsive">
                        <hr></hr>
                        <h3 id="vehicle_title">Vehicles List </h3>
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Brand</th>
                                        <th>Type</th>
                                        <th>Tires</th>
                                        <th>Powermotor</th>

                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    ${listVehicles()}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
}
