import "../../bootstrap.js";
import ReactPaginate from "react-paginate";
import { useEffect, useState } from "react";
import { useGlobalContext } from "../context";
import UserSubscriptions from "../lists/UserSubscriptions";

export default function UserTab() {
    const [offset, setOffset] = useState(0);
    const [subscriptions, setSubscriptions] = useState([]);
    const [perPage] = useState(5);
    const [pageCount, setPageCount] = useState(0);

    const { authenticatedUser } = useGlobalContext();

    async function getSubscriptions() {
        try {
            const subscriptionsUrl =
                document.getElementById("subscriptionsUrl").value;
            const response = await window.axios.get(subscriptionsUrl);
            const subscriptions = response.data.subscriptions;
            const slice = subscriptions.slice(offset, offset + perPage);
            setSubscriptions(slice);
            setPageCount(Math.ceil(subscriptions.length / perPage));
        } catch (error) {
            console.log(error);
            setTimeout(() => {
                getSubscriptions();
            }, 3000);
        }
    }

    function handlePageClick(e) {
        const selectedPage = e.selected;
        setOffset(selectedPage + 1);
    }

    useEffect(() => {
        getSubscriptions();
    }, [offset]);

    return (
        <div>
            {!subscriptions || !authenticatedUser ? (
                <p className="text-center">Loading...</p>
            ) : (
                <>
                    <UserSubscriptions subscriptions={subscriptions} />
                    {pageCount > 1 && (
                        <ReactPaginate
                            previousLabel={"Precedent"}
                            nextLabel={"Suivant"}
                            breakLabel={"..."}
                            breakClassName={"break-me"}
                            pageCount={pageCount}
                            marginPagesDisplayed={2}
                            pageRangeDisplayed={5}
                            onPageChange={handlePageClick}
                            containerClassName={"pagination"}
                            activeClassName={"active"}
                        />
                    )}
                </>
            )}
        </div>
    );
}
